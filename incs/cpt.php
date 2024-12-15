<?php
add_action('init', function () {
    register_post_type(
        'advantages',
        array(
            'labels' => array(
                'name' => 'Преимущества',
                'singular_name' => 'Преимущество',
                'add_new' => 'Добавить преимущество',
                'add_new_item' => 'Добавить новое преимущество',
                'edit_item' => 'Изменить преимущество',
                'new_item' => 'Новое преимущество',
                'view_item' => 'Просмотр преимущества',
                'search_items' => 'Найти преимущество',
                'not_found' => 'Преимуществ не найдено',
                'not_found_in_trash' => 'В корзине нет преимуществ',
                'parent_item_colon' => 'Родительское преимущество',
                'all_items' => 'Все преимущества',
                'archives' => 'Архивы преимуществ',
                'menu_name' => 'Преимущества',
                'name_admin_bar' => 'Преимущество',
                'view_items' => 'Просмотр преимуществ',
                'attributes' => 'Свойства преимущества',

                'insert_into_item' => 'Вставить в преимущество',
                'uploaded_to_this_item' => 'Загружено для этого преимущества',
                'featured_image' => 'Изображение преимущества',
                'set_featured_image' => 'Установить изображение преимущества',
                'remove_featured_image' => 'Удалить изображение преимущества',
                'use_featured_image' => 'Использовать как изображение преимущества',

                'item_updated' => 'Преимущество обновлёно.',
                'item_published' => 'Преимущество добавлено.',
                'item_published_privately' => 'Преимущество добавлено приватно.',
                'item_reverted_to_draft' => 'Преимущество сохранёно как черновик.',
                'item_scheduled' => 'Публикация преимуществ запланирована.',
            ),
            'public' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-columns',
            'show_in_rest' => true,
        )
    );
});