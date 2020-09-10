<?php

namespace App\Models;

use App\Core\Database;

class Article extends Database {
    const TABLE = 'article';
    const TABLE_ABBR = 'a';

    private $id;
    private $web_id;
    private $slug;
    private $title;
    private $detail;
    private $image;
    private $status;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->web_id = $data['web_id'] ?? 2;
        $this->slug = $data['slug'] ?? null;
        $this->title = $data['title'] ?? null;
        $this->detail = $data['detail'] ?? null;
        $this->image = $data['image'] ?? null;
        $this->status = $data['status'] ?? 1;
    }

    public static function selectById(int $id)
    {
        return self::buildQuery()->table(self::TABLE.' as '.self::TABLE_ABBR)->select()->where(self::TABLE_ABBR.'.id', $id);
    }

    public static function select(array $param = null)
    {
        return self::buildQuery()->table(self::TABLE.' as '.self::TABLE_ABBR)->select($param);
    }

    public function add(\PDO $pdo = null)
    {
        $pdo = $pdo ?? self::connect();
        return $this->buildQuery($pdo)
            ->table(self::TABLE.' as '.self::TABLE_ABBR)
            ->insert($this->get())
            ->execute();
    }

    public function update(\PDO $pdo = null)
    {
        $pdo = $pdo ?? self::connect();
        return $this->buildQuery($pdo)->table(self::TABLE.' as '.self::TABLE_ABBR)
            ->update($this->get())
            ->where(self::TABLE_ABBR.'.id', $this->id)
            ->execute();
    }

    /**
     * @throws \Exception
     */
    public static function destroy(int $id, \PDO $pdo = null)
    {
        try {
            $pdo = $pdo ?? self::connect();
            $update = $pdo->prepare("DELETE FROM article WHERE id = ?");
            return $update->execute([$id]);
        } catch (\PDOException $e) {
            throw new \Exception('พบข้อบกพร่องทางเทคนิค รหัส: ' . $e->getCode(), 0, $e);
        }
        return false;
    }

    public function get()
    {
        $output = [];
        foreach ($this as $key => $data) {
            if (!is_null($data)) $output[$key] = $data;
            else continue;
        }
        return $output;
    }

}