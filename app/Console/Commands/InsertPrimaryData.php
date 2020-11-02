<?php

namespace App\Console\Commands;


use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class InsertPrimaryData extends Command
{
    protected $signature = 'dev:insert-data';
    protected $description = 'Insert primary data to database for local environment';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(\DatabaseSeeder $databaseSeeder)
    {
        if ($this->confirm('Вы уверены что хотите вставить первоначальные данные? Все текущие данные будут удалены!')) {
            $tableNames = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
            Schema::disableForeignKeyConstraints();
            foreach ($tableNames as $name) {
                //if you don't want to truncate migrations
                if ($name == 'migrations') {
                    continue;
                }
                DB::table($name)->truncate();
            }
            Schema::enableForeignKeyConstraints();
            $databaseSeeder->run();

            $connectionCrm = DB::connection('pgsql_old');
            $connectionPanel = DB::connection('pgsql_old_panel');

            $courses = $connectionCrm->select('SELECT goods.*, gtg.id_good, gtg.id_group FROM goods left join group_to_goods gtg on goods.id = gtg.id_good WHERE goods.del = 0');
            foreach($courses as $course) {
                $selling = $connectionPanel->select("SELECT * FROM selling WHERE id_product = {$course->id}");

                switch ($course->cat_id) {
                    //VM
                    case 17:
                        $product['project_id'] = 1;
                        $product['type'] = Product::TYPE_SK;
                        break;
                    case 18:
                        $product['project_id'] = 1;
                        $product['type'] = Product::TYPE_OK;
                        break;
                    case 19:
                        $product['project_id'] = 1;
                        $product['type'] = Product::TYPE_CONSULT;
                        break;
                    //VD
                    case 23:
                        $product['project_id'] = 2;
                        $product['type'] = Product::TYPE_SK;
                        break;
                    case 24:
                        $product['project_id'] = 2;
                        $product['type'] = Product::TYPE_OK;
                        break;
                    case 25:
                        $product['project_id'] = 2;
                        $product['type'] = Product::TYPE_CONSULT;
                        break;
                    //VZ
                    case 33:
                        $product['project_id'] = 3;
                        $product['type'] = Product::TYPE_SK;
                        break;
                    case 30:
                        $product['project_id'] = 3;
                        $product['type'] = Product::TYPE_OK;
                        break;
                    case 34:
                        $product['project_id'] = 3;
                        $product['type'] = Product::TYPE_CONSULT;
                        break;
                    //VP
                    case 41:
                        $product['project_id'] = 4;
                        $product['type'] = Product::TYPE_SK;
                        break;
                    case 42:
                        $product['project_id'] = 4;
                        $product['type'] = Product::TYPE_OK;
                        break;
                    case 43:
                        $product['project_id'] = 4;
                        $product['type'] = Product::TYPE_CONSULT;
                        break;
                    //IM
                    case 51:
                        $product['project_id'] = 5;
                        $product['type'] = Product::TYPE_SK;
                        break;
                    case 48:
                        $product['project_id'] = 5;
                        $product['type'] = Product::TYPE_OK;
                        break;
                    case 49:
                        $product['project_id'] = 5;
                        $product['type'] = Product::TYPE_CONSULT;
                        break;
                    //Spain
                    case 45:
                        $product['project_id'] = 6;
                        $product['type'] = Product::TYPE_SK;
                        break;
                    case 39:
                        $product['project_id'] = 6;
                        $product['type'] = Product::TYPE_OK;
                        break;
                    //Portu
                    case 55:
                        $product['project_id'] = 7;
                        $product['type'] = Product::TYPE_OK;
                        break;
                    //Turkey
                    case 57:
                        $product['project_id'] = 8;
                        $product['type'] = Product::TYPE_SK;
                        break;
                    case 53:
                        $product['project_id'] = 8;
                        $product['type'] = Product::TYPE_OK;
                        break;
                    //English
                    case 60:
                        $product['project_id'] = 9;
                        $product['type'] = Product::TYPE_OK;
                        break;
                }

                if (!isset($product['type'])) continue;

                $product['name'] = $course->name;
                $product['price'] = $course->price;
                $product['created_at'] = Carbon::now();
                $product['updated_at'] = Carbon::now();

                if ($selling) {
                    $product['youtube_id'] = $selling[0]->id_youtube;
                    $product['content'] = $selling[0]->content_open;
                    $product['content_video'] = $selling[0]->content_open_video;
                }

                $productId = DB::table('products')->insertGetId($product);
                unset($product);
                //MailerLite
                if ($course->id_group) {
                    $idGroup = $course->id_group;
                    $groups = $connectionCrm->select("SELECT * FROM ml_subs_company  WHERE id_client_group = {$idGroup}");
                    foreach($groups as $group) {
                        $newGroup['name'] = $group->name;
                        $newGroup['paid'] = $group->sw_paid;
                        $newGroup['ml_group_id'] = $group->id_gr;
                        $newGroup['product_id'] = $productId;
                        $newGroup['created_at'] = Carbon::now();
                        $newGroup['updated_at'] = Carbon::now();

                        $newGroups[] = $newGroup;
                    }
                }
            }

            DB::table('mailerlite_groups')->insert($newGroups);
            var_dump('Заполнение БД прошло успешно!');
        }
    }
}
