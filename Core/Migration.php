<?php


namespace Core;


class Migration
{
    protected \PDO $db;
    const PATH = __DIR__ . '/../migration';

    public function __construct()
    {
        $this->db = DB::init(new Config());
    }

    public static function run()
    {
        $migration = new static();
        if (!$migration->isMigrationTable()) {
            $migration->makeMigrate('migration.sql');
        }
        foreach ($migration->getMigrationFiles() as $file) {
            $migration->makeMigrate($file)
                ->store($file);
        }

    }

    public function getMigrationFiles(): array
    {
        return array_diff(scandir(static::PATH),
            ['.', '..', 'migration.sql'],
            array_column($this->db->query('SELECT name FROM migration', \PDO::FETCH_ASSOC)->fetchAll(), 'name')
        );
    }

    public function isMigrationTable()
    {
        return (bool)$this->db->query('SHOW TABLES LIKE "migration"', \PDO::FETCH_ASSOC)->fetchAll();
    }

    public function makeMigrate(string $file)
    {
        $this->db->exec(file_get_contents(static::PATH . "/$file"));
        return $this;
    }

    public function store($file)
    {
        $query = $this->db->prepare('INSERT INTO migration (name) VALUES (:name)');
        $query->execute([':name' => $file]);
        echo "Migration \"$file\" was done!!!", PHP_EOL;
    }
}
