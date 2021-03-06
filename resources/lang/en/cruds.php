<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'approved'                 => 'Approved',
            'approved_helper'          => ' ',
            'phone_no'                 => 'Phone No',
            'phone_no_helper'          => ' ',
            'address'                  => 'Address',
            'address_helper'           => ' ',
            'image'                    => 'Image',
            'image_helper'             => ' ',
        ],
    ],
    'productManagement' => [
        'title'          => 'Product Management',
        'title_singular' => 'Product Management',
    ],
    'orderManagement' => [
        'title'          => 'Order',
        'title_singular' => 'Order',
    ],
    'posorder' => [
        'title'          => 'Pos Order',
        'title_singular' => 'Pos Order',
    ],
    'productCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],

// 1
    'orderCategory' => [
        'title'          => 'Cancel',
        'title_singular' => 'Cancel',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'product'            => 'Product',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],

    'orderTag' => [
        'title'          => 'Pending',
        'title_singular' => 'Pending',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],

    'orderPage' => [
        'title'          => 'Confirmed',
        'title_singular' => 'Confirmed',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],

    'orderInProcess' => [
        'title'          => 'In Process',
        'title_singular' => 'In Process',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],

    'orderReadydelivery' => [
        'title'          => 'Ready Delivery',
        'title_singular' => 'Ready Delivery',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],

    'orderItemOnWay' => [
        'title'          => 'Item On A Way',
        'title_singular' => 'Item On A Way',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],

    'orderDelivered' => [
        'title'          => 'Delivered',
        'title_singular' => 'Delivered',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],
// end
    'productTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'product' => [
        'title'          => 'Products',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'name'                   => 'Name',
            'name_helper'            => ' ',
            'price'                   => 'Price',
            'price_helper'            => ' ',
            'discount'                   => 'Discount',
            'discount_helper'            => ' ',

            'start_time'                   => 'start_time',
            'start_time_helper'            => ' ',

            'end_time'                   => 'end_time',
            'end_time_helper'            => ' ',

            'disc_type'               => 'Discount Type',
            'disc_type_helper'        => ' ',



            'description'            => 'Description',
            'description_helper'     => ' ',
            'tag'                    => 'Tags',
            'tag_helper'             => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => ' ',
            'sub_category'           => 'Sub Category',
            'sub_category_helper'    => ' ',
            'featured'               => 'Featured',
            'featured_helper'        => ' ',
            'regular_price'          => 'Regular Price',
            'regular_price_helper'   => ' ',
            'sale_price'             => 'Sale Price',
            'sale_price_helper'      => ' ',
            'sku'                    => 'Sku',
            'sku_helper'             => ' ',
            'qty'                    => 'Qty',
            'qty_helper'             => ' ',
            'fetaured_image'         => 'Fetaured Image',
            'fetaured_image_helper'  => ' ',
            'vendor'                 => 'Vendor',
            'vendor_helper'          => ' ',
            'image'                  => 'Image',
            'image_helper'           => ' ',
            'category'               => 'Category',
            'category_helper'        => ' ',
            'variation'              => 'Variation',
            'variation_helper'       => ' ',
            'unit'                   => 'Unit',
            'unit_helper'            => ' ',
            'attribute'              => 'Attribute',
            'attribute_helper'       => ' ',
            'attribute_value'        => 'Attribute Value',
            'attribute_value_helper' => ' ',
        ],
    ],
    'contentManagement' => [
        'title'          => 'Content management',
        'title_singular' => 'Content management',
    ],
    'contentCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentPage' => [
        'title'          => 'Pages',
        'title_singular' => 'Page',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'title'                 => 'Title',
            'title_helper'          => ' ',
            'category'              => 'Categories',
            'category_helper'       => ' ',
            'tag'                   => 'Tags',
            'tag_helper'            => ' ',
            'page_text'             => 'Full Text',
            'page_text_helper'      => ' ',
            'excerpt'               => 'Excerpt',
            'excerpt_helper'        => ' ',
            'featured_image'        => 'Featured Image',
            'featured_image_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated At',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted At',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'subCat' => [
        'title'          => 'Sub Category',
        'title_singular' => 'Sub Category',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'name'                  => 'Name',
            'name_helper'           => ' ',
            'parent_cateory'        => 'Parent Cateory',
            'parent_cateory_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'description'           => 'Description',
            'description_helper'    => ' ',
            'photo'                 => 'Photo',
            'photo_helper'          => ' ',
        ],
    ],
    'vendor' => [
        'title'          => 'Vendor',
        'title_singular' => 'Vendor',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'name'                   => 'Name',
            'name_helper'            => ' ',
            'business_name'          => 'Business Name',
            'business_name_helper'   => ' ',
            'status'                 => 'Status',
            'status_helper'          => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'featured'               => 'Featured',
            'featured_helper'        => ' ',
            'promoted'               => 'Promoted',
            'promoted_helper'        => ' ',
            'email'                  => 'Email',
            'email_helper'           => ' ',
            'phone'                  => 'Phone',
            'phone_helper'           => ' ',
            'address'                => 'Address',
            'address_helper'         => ' ',
            'rating'                 => 'Rating',
            'rating_helper'          => ' ',
            'payouts'                => 'Payouts',
            'payouts_helper'         => ' ',
            'earning'                => 'Earning',
            'earning_helper'         => ' ',
            'cod_balance'            => 'Cod Balance',
            'cod_balance_helper'     => ' ',
            'oniline_payment'        => 'Oniline Payment',
            'oniline_payment_helper' => ' ',
            'image'                  => 'Image',
            'image_helper'           => ' ',
            'cid_expiry_data'        => 'Cid Expiry Data',
            'cid_expiry_data_helper' => ' ',
            'cid_no'                 => 'Cid No',
            'cid_no_helper'          => ' ',
            'cnic_image'             => 'Cnic Image',
            'cnic_image_helper'      => ' ',
            'account_no'             => 'Account No',
            'account_no_helper'      => ' ',
            'opening_time'           => 'Opening Time',
            'opening_time_helper'    => ' ',
            'closing_time'           => 'Closing Time',
            'closing_time_helper'    => ' ',
            'business_type'          => 'Business Type',
            'business_type_helper'   => ' ',
            'bank_name'              => 'Bank Name',
            'bank_name_helper'       => ' ',
            'iban_no'                => 'Iban No',
            'iban_no_helper'         => ' ',
            'swift_code'             => 'Swift Code',
            'swift_code_helper'      => ' ',
        ],
    ],
    'driver' => [
        'title'          => 'Driver',
        'title_singular' => 'Driver',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'name'                    => 'Name',
            'name_helper'             => ' ',
            'email'                   => 'Email',
            'email_helper'            => ' ',
            'address'                 => 'Address',
            'address_helper'          => ' ',
            'profile'                 => 'Profile',
            'profile_helper'          => ' ',
            'transport'               => 'Transport',
            'transport_helper'        => ' ',
            'transport_image'         => 'Transport Image',
            'transport_image_helper'  => ' ',
            'status'                  => 'Status',
            'status_helper'           => ' ',
            'cnic_no'                 => 'CNIC No',
            'cnic_no_helper'          => ' ',
            'cnic_start_date'         => 'CNIC Start Date',
            'cnic_start_date_helper'  => ' ',
            'cnic_expire_date'        => 'CNIC Expire Date',
            'cnic_expire_date_helper' => ' ',
            'store_name'              => 'Store Name',
            'store_name_helper'       => ' ',
            'account_name'            => 'Account Name',
            'account_name_helper'     => ' ',
            'current_balance'         => 'Current Balance',
            'current_balance_helper'  => ' ',
            'iban_no'                 => 'IBAN No',
            'iban_no_helper'          => ' ',
            'bank_name'               => 'Bank Name',
            'bank_name_helper'        => ' ',
            'swift_code'              => 'Swift Code',
            'swift_code_helper'       => ' ',
            'total_orders'            => 'Total Orders',
            'total_orders_helper'     => ' ',
            'total_earning'           => 'Total Earning',
            'total_earning_helper'    => ' ',
            'transport_no'            => 'Transport No',
            'transport_no_helper'     => ' ',
            'provider'                => 'Select Provider',
            'provider_helper'         => ' ',
            'wal_amount'              => 'Amount',
            'wal_amount_helper'       => ' ',
            'phone_no'                => 'Phone No',
            'phone_no_helper'         => ' ',
            'wal_mobile_no'           => 'Mobile No',
            'wal_mobile_no_helper'    => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'unit' => [
        'title'          => 'Unit',
        'title_singular' => 'Unit',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'variation' => [
        'title'          => 'Variation',
        'title_singular' => 'Variation',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'quantity'          => 'Quantity',
            'quantity_helper'   => ' ',
            'price'             => 'Price',
            'price_helper'      => ' ',
        ],
    ],
    'attribute' => [
        'title'          => 'Attribute',
        'title_singular' => 'Attribute',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'attributedetail' => [
        'title'          => 'Attribute Details',
        'title_singular' => 'Attribute Detail',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'value'             => 'Value',
            'value_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'attribute'         => 'Attribute',
            'attribute_helper'  => ' ',
        ],
    ],
    'order' => [
        'title'          => 'Order',
        'title_singular' => 'Order',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',

            'st_date'           => 'Date',
            'st_date_helper'    => ' ',

            'driver'            => 'Driver',
            'driver_helper'     => ' ',
            'customer'          => 'Customer',
            'customer_helper'   => ' ',
            'quantity'          => 'Quantity',
            'quantity_helper'   => ' ',
            'payment'           => 'Payment',
            'payment_helper'    => ' ',
            'status'            => ' Payment Status',
            'status_helper'     => ' ',

            'order_status'            => 'Order_Status',
            'order_status_helper'     => ' ',

            'order_type'            => 'Order_Type',
            'order_type_helper'     => ' ',

            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
];
