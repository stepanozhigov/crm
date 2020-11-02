<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $name
 * @property array|null $settings
 * @property int $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $priority
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page wherePriority($value)
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClientProject
 *
 * @property int $client_id
 * @property int $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProject query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProject whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProject whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProject whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ClientProject extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Selling
 *
 * @property int $id
 * @property int $product_id
 * @property int $project_id
 * @property string $name
 * @property string|null $title
 * @property string $slug
 * @property string|null $youtube_id
 * @property string|null $content
 * @property string|null $content_video
 * @property string|null $tag_name
 * @property int $type
 * @property int $private
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Selling newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Selling newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Selling query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Selling whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Selling whereContentVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Selling whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Selling whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Selling whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Selling wherePrivate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Selling whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Selling whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Selling whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Selling whereTagName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Selling whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Selling whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Selling whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Selling whereYoutubeId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\Project $project
 */
	class Selling extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RbkPay
 *
 * @property int $id
 * @property string $invoice
 * @property int $status
 * @property string $invoice_access_token
 * @property string|null $response
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bill|null $bill
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay whereInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay whereInvoiceAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay whereResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RbkPay whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class RbkPay extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Webinar
 *
 * @property int $id
 * @property string $slug
 * @property string|null $title
 * @property string|null $description
 * @property string $video_frame
 * @property string|null $buttons
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereButtons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereVideoFrame($value)
 * @mixin \Eloquent
 * @property string|null $page_title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar wherePageTitle($value)
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Webinar whereName($value)
 */
	class Webinar extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BillProduct
 *
 * @property int $bill_id
 * @property int|null $product_id
 * @property int $price
 * @property int $primary
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillProduct whereBillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillProduct wherePrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class BillProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClientTag
 *
 * @property int $client_id
 * @property int $tag_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientTag whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientTag whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientTag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ClientTag extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Comment
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $product_id
 * @property int $client_id
 * @property string $content
 * @property int $approved
 * @property string|null $email
 * @property string|null $spam
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $_lft
 * @property int $_rgt
 * @property int|null $parent_id
 * @property-read \Kalnoy\Nestedset\Collection|\App\Models\Comment[] $children
 * @property-read int|null $children_count
 * @property-read \App\Models\Comment|null $parent
 * @method static \Kalnoy\Nestedset\Collection|static[] all($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment d()
 * @method static \Kalnoy\Nestedset\Collection|static[] get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereLft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereRgt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereSpam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereUpdatedAt($value)
 */
	class Comment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Project
 *
 * @property int $id
 * @property string $name
 * @property string $domain
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereName($value)
 * @mixin \Eloquent
 * @property string $language
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereLanguage($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PaymentMethod[] $paymentMethods
 * @property-read int|null $payment_methods_count
 */
	class Project extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Client
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $status
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Client onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Client withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Client withoutTrashed()
 * @property string|null $phone
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client wherePhone($value)
 * @property-read \App\Models\ClientMailerlite $subscriber
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @property-read int|null $projects_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $status
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $last_visit
 * @property string|null $last_id
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLastId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLastVisit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User withoutTrashed()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductCategory
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent_id
 * @property int $level
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCategory whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCategory whereParentId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\ProductCategory|null $parentCategory
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductCategory whereDescription($value)
 * @property-read \App\Models\ProductCategory|null $childCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $product
 * @property-read int|null $product_count
 * @property-read int|null $child_category_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 */
	class ProductCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LanguageTranslate
 *
 * @property int $source_id
 * @property string $language_id
 * @property string $translation
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageTranslate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageTranslate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageTranslate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageTranslate whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageTranslate whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageTranslate whereTranslation($value)
 * @mixin \Eloquent
 */
	class LanguageTranslate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LanguageSource
 *
 * @property int $id
 * @property string $message
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\LanguageTranslate[] $translates
 * @property-read int|null $translates_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageSource query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LanguageSource whereMessage($value)
 * @mixin \Eloquent
 */
	class LanguageSource extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentMethod
 *
 * @property int $id
 * @property string $name
 * @property string|null $title
 * @property string|null $description
 * @property string|null $logo
 * @property string|null $content_page
 * @property string|null $commission
 * @property int $status
 * @property string|null $maturity_of_money
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereContentPage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereMaturityOfMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethod whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class PaymentMethod extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Bill
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $client_id
 * @property string $invoice
 * @property int $invoice_status
 * @property string|null $paid_at
 * @property int $sum
 * @property int|null $discount_id
 * @property int $sum_src
 * @property string|null $referrer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereDiscountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereInvoiceStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill wherePaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereReferrer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereSumSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Client|null $client
 * @property-read \App\Models\Product|null $product
 * @property-read int|null $product_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @property int|null $payment_system_id
 * @property string|null $payment_system_type
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $paymentSystem
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill wherePaymentSystemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill wherePaymentSystemType($value)
 */
	class Bill extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tag
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $name
 * @property int $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereStatus($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Client[] $clients
 * @property-read int|null $clients_count
 */
	class Tag extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MailerliteGroup
 *
 * @property int $id
 * @property int $ml_group_id
 * @property string $name
 * @property int $product_id
 * @property int $paid
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup whereMlGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MailerliteGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Product|null $product
 */
	class MailerliteGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Discount
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $size
 * @property int $type
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int|null $sw_time_limit
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereSwTimeLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Discount whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 */
	class Discount extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentMethodProject
 *
 * @property int $payment_method_id
 * @property int $project_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethodProject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethodProject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethodProject query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethodProject wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentMethodProject whereProjectId($value)
 * @mixin \Eloquent
 */
	class PaymentMethodProject extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Language
 *
 * @property string $language
 * @property int $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\LanguageTranslate[] $translates
 * @property-read int|null $translates_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereStatus($value)
 * @mixin \Eloquent
 */
	class Language extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BillTag
 *
 * @property int $bill_id
 * @property int $tag_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillTag whereBillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillTag whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BillTag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class BillTag extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClientProduct
 *
 * @property int $client_id
 * @property int $product_id
 * @property int|null $bill_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProduct whereBillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProduct whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ClientProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DiscountProduct
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiscountProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiscountProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiscountProduct query()
 * @mixin \Eloquent
 * @property int $discount_id
 * @property int $product_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiscountProduct whereDiscountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiscountProduct whereProductId($value)
 */
	class DiscountProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $category_id
 * @property int $type
 * @property string $name
 * @property string $alias
 * @property int|null $price
 * @property int|null $fake_price
 * @property int $unlim_bills
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereFakePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUnlimBills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\ProductCategory|null $category
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product withoutTrashed()
 * @property string $page_bill
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePageBill($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Discount[] $discount
 * @property-read int|null $discount_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bill[] $bills
 * @property-read int|null $bills_count
 * @property int|null $project_id
 * @property-read \App\Models\Project|null $project
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereProjectId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Discount[] $discounts
 * @property-read int|null $discounts_count
 * @property-read \App\Models\Selling|null $selling
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClientMailerlite
 *
 * @property int $id
 * @property int $client_id
 * @property string $ml_client_id
 * @property int|null $mailerlite_group_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite whereMailerliteGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite whereMlClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClientMailerlite whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Client|null $client
 * @property-read \App\Models\MailerliteGroup|null $mailerliteGroup
 */
	class ClientMailerlite extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\YandexPay
 *
 * @property int $id
 * @property string $link
 * @property int $status
 * @property string $yandex_id
 * @property string|null $errors
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bill|null $bill
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay whereErrors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\YandexPay whereYandexId($value)
 * @mixin \Eloquent
 */
	class YandexPay extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StripePay
 *
 * @property string $payment_id
 * @property int $amount
 * @property string $currency
 * @property string $status
 * @property-read \App\Models\Bill|null $bill
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StripePay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StripePay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StripePay query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StripePay whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StripePay whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StripePay whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StripePay whereStripeId($value)
 * @mixin \Eloquent
 */
	class StripePay extends \Eloquent {}
}
	
