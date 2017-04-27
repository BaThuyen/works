<?php

namespace Sites\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

class SitesWorks extends Model {

    protected $table = 'sites_works';
    public $timestamps = false;
    protected $fillable = [
        'work_name',
        'work_category',
        'work_url',
        'work_description',
    ];
    protected $primaryKey = 'work_id';

    public function get_sites_works($site_id) {
        $eloquent = self::orderBy('site_category_id');
        $eloquent->where('site_id', $site_id);
        $sites_works = $eloquent->paginate(10);
        return $sites_works;
    }

    public function add_work($input) {
        try {
            self::create([
                        'work_name' => $input['work_name'],
                        'work_category' => $input['work_category'],
                        'work_url' => $input['work_url'],
                        'work_description' => $input['work_description'],
            ]);
        } catch (Exception $e) {
            $work = self::where('work_url', $input['work_url'])->first();
            $work->work_name = $input['work_name'];
            $work->work_category = $input['work_category'];
            $work->work_description = $input['work_description'];
            $work->save();
        }
    }

    /**
     * Get list of sites categories
     * @param type $category_id
     * @return type
     */
    public function pluckSelect() {
        return $this->pluck('category_name', 'category_id')->all();
    }

}
