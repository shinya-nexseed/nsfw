<?php
    class Blog {
        // DB内のblogsテーブルとのデータのやりとりを担当するファイル
        // echo "blog model file";

        // modelファイルは単に最適なsql文を返すファイル
        
        // privateなプロパティを定義
        private $plural_resource = '';

        public function __construct($plural_resource) {
            $this->plural_resource = $plural_resource;
        }

        public function findAll() {
            // データを取得する (model)
            $sql = 'SELECT * FROM ' . $this->plural_resource;
            return $sql;
        }
    }
?>
















