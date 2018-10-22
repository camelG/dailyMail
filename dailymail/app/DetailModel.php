<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailModel extends Model
{
    protected $table = 'daily_detail';
    protected $query;

    public function __construct()
    {
        $this->query = DB::table($this->table);
    }

    public function get($where = null)
    {
        if ($where) {
            $this->query->where($where);
        }

        return $this->query->get();
    }

    public function insert($data)
    {
        $this->query->insert($data);

        return DB::getPdo()->lastInsertId();
    }

    public function insert_batch($data)
    {
        foreach ($data as $d) {
            $this->query->insert($d);
        }
    }
}
