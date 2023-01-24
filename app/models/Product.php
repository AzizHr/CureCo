<?php
class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Add Product
    public function addProduct($data)
    {
        $this->db->query('INSERT INTO product (name , quantity , price , image) VALUES(:name1 , :quantity1 , :price1 , :image1) , (:name2 , :quantity2 , :price2 , :image2)');
        // Bind values
        $this->db->bind(':name1', $data['name1']);
        $this->db->bind(':quantity1', $data['quantity1']);
        $this->db->bind(':price1', $data['price1']);
        $this->db->bind(':image1', $data['image1']);
        $this->db->bind(':name2', $data['name2']);
        $this->db->bind(':quantity2', $data['quantity2']);
        $this->db->bind(':price2', $data['price2']);
        $this->db->bind(':image2', $data['image2']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Get All Products
    public function getProducts()
    {
        $this->db->query('SELECT * FROM product');

        $row = $this->db->resultSet();

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    // Get One Product
    public function getProduct($id)
    {
        $this->db->query('SELECT * FROM product WHERE id = :id');
        $this->db->bind(':id', $id);


        $row = $this->db->single();

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    // Edit A Product
    public function editProductWithImage($id, $data)
    {
        $this->db->query('UPDATE product SET name = :name , quantity = :quantity , price = :price , image = :image WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':image', $data['image']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editProductWithoutImage($id, $data)
    {
        $this->db->query('UPDATE product SET name = :name , quantity = :quantity , price = :price WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':price', $data['price']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // Delete A Product
    public function deleteProduct($id)
    {
        $this->db->query('DELETE FROM product WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function sortByPriceASC()
    {
        $this->db->query('SELECT * FROM product ORDER BY price ASC');
        if ($this->db->resultSet()) {
            return $this->db->resultSet();
        } else {
            return false;
        }
    }

    public function sortByPriceDESC()
    {
        $this->db->query('SELECT * FROM product ORDER BY price DESC');
        if ($this->db->resultSet()) {
            return $this->db->resultSet();
        } else {
            return false;
        }
    }

    public function sortByDateASC()
    {
        $this->db->query('SELECT * FROM product ORDER BY date ASC');
        
        if ($this->db->resultSet()) {
            return $this->db->resultSet();
        } else {
            return false;
        }
    }

    public function sortByDateDESC()
    {
        $this->db->query('SELECT * FROM product ORDER BY date DESC');
        
        if ($this->db->resultSet()) {
            return $this->db->resultSet();
        } else {
            return false;
        }
    }

    public function searchInProducts($name)
    {
        $this->db->query('SELECT * FROM product WHERE name LIKE "%" :name "%"');
        $this->db->bind(':name', $name);
        
        if ($this->db->resultSet()) {
            return $this->db->resultSet();
        } else {
            return false;
        }
    }

    public function getNumberOfProducts()
    {
        $this->db->query('SELECT COUNT(id) as "numberOdProducts" FROM product');
        
        $row = $this->db->single();

        if ($row) {
            return $row['numberOdProducts'];
        } else {
            return false;
        }
    }

    public function getPriceAverege()
    {
        $this->db->query('SELECT AVG(price) as "priceAverege" FROM product');
        
        $row = $this->db->single();

        if ($row) {
            return $row['priceAverege'];
        } else {
            return false;
        }
    }

    public function getMaxPrice()
    {
        $this->db->query('SELECT MAX(price) as "maxPrice" FROM product');
        
        $row = $this->db->single();

        if ($row) {
            return $row['maxPrice'];
        } else {
            return false;
        }
    }

    public function getMinPrice()
    {
        $this->db->query('SELECT MIN(price) as "minPrice" FROM product');
        
        $row = $this->db->single();

        if ($row) {
            return $row['minPrice'];
        } else {
            return false;
        }
    }
}
