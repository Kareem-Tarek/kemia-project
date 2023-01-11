<?php

return  [
    'add_category'                   => 'Add Category',
    'category'                       => 'Category',
    'category_list'                  => 'Category List',
    'edit_category'                  => 'Edit Category',
    'deleted_categories'             => 'Deleted Categories',
    'name'                           => 'Name',
    'status'                         => 'Status',
    'available'                      => 'Available',
    'unavailable'                    => 'Unavailable',
    'select_status'                  => 'Please select a status.',
    'categories'                     => 'Categories',  //for dashboard "home" blade
    'sub_categories'                 => 'Sub-categories',  //for dashboard "home" blade
    'parent_id'                      => 'Sub-category of',  //for "index" blade
    'sub_category_of'                => 'Sub-category of',    //for "create" & "edit" blade
    'select_subcategory'             => 'No sub-category selected.',
    'note'                           => 'NOTE:',
    'index_forelse_loop_empty_msg_1' => 'There are no categories yet!',
    'index_forelse_loop_empty_msg_2' => 'Please add categories/sub-categories',
    'index_forelse_loop_empty_msg_3' => 'and come back again.',
    'category_and_subcategory_note'  => "If (Sub-category of) is null then the (Name) is a main category, and if (Sub-category of) is not null then then the (Name) is a sub-category of an already existing main category from the (Sub-category of)." ,
    'empty_deleted_foresle_msg'      => 'There are no categories deleted yet!',
    'category_delete_confirm_msg'    => 'Are you sure that you want to permanently delete this category?',
    'sub-category_delete_confirm_msg'    => 'Are you sure that you want to permanently delete this category?',
    'sub-category_cascade_warning'       => 'All the sub-categories that belongs to this category will be deleted!',

];
