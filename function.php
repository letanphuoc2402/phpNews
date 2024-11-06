<?php
    require_once 'config.php';
    function getCategories($db)
    {
        $sql = 'SELECT * FROM categories';
        $result = $db->query($sql);
        if($result->num_rows > 0)
        {
            $categories = array();
            while($row = $result->fetch_assoc())
            {
                $categories[] = $row;
            }
            return $categories;
        }
    }
    function getItemsWithCategory($db)
    {
        $sql = "SELECT items.id, items.title, items.excerpt, items.content, items.image, 
                   items.views, items.created_at, items.author, categories.name  AS category_name
            FROM items
            JOIN categories ON items.category = categories.id";
           
        $result = $db->query($sql);
        if($result->num_rows > 0)
        {
            $items = array();
            while($row = $result->fetch_assoc())
            {
                $items[] = $row;
            }
            return $items;
        }         
    }
    function getItemWithFeatureView($db)
    {
        $sql = "SELECT items.id, items.title, items.excerpt, items.content, items.image, 
        items.views, items.created_at, items.author,categories.name  AS category_name
        FROM items
        JOIN categories ON items.category = categories.id
        WHERE items.featured = 1
        ORDER BY items.views DESC
        LIMIT 4";
        
        $results = $db->query($sql);
        if($results->num_rows > 0)
        {
            $items = array(); 
            while($rows = $results->fetch_assoc())
            {
                $items[] = $rows;
            }
            return $items;
        }
    }
    function getItemById($db, $id)
    {
        $sql = "SELECT items.id, items.title, items.excerpt, items.content, items.image, 
                items.views, items.created_at, items.author, categories.name AS category_name
                FROM items
                JOIN categories ON items.category = categories.id
                WHERE items.id = ? LIMIT 1";
        
        if ($stmt = $db->prepare($sql)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->num_rows > 0 ? $result->fetch_assoc() : null;
        }
        return null;
    }
?>