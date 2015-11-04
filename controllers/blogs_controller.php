<?php
    class BlogsController {
        // データなどを処理する (controller)

        // プロパティ
        private $db;
        private $plural_resource;

        // マジックメソッド (引数ふたつ)
        public function __construct($db, $plural_resource) {
            $this->db = $db;
            $this->plural_resource = $plural_resource;
        }

        public function index() {
            // Blogクラスから$Blogインスタンス生成
            $Blog = new Blog($this->plural_resource);
            $sql = $Blog->findAll(); // 'SELECT * FROM blogs'という文字列が返ってくる

            $blogs = mysqli_query($this->db, $sql) or die(mysqli_error($this->db));

            return $blogs;
        }
    }
?>
