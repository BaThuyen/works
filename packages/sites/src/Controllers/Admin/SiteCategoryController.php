<?php

namespace Sites\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Sites\Models\Sites;
use Sites\Models\SitesCategories;
use Works\Models\WorksCategories;
use Sites\Models\MapCategories;
use Sites\Models\SitesWorks;
use Goutte\Client as GoutteClient;
use GuzzleHttp\Client as GuzzleClient;
/**
 * Validators
 */
use Sites\Validators\SiteAdminValidator;

class SiteCategoryController extends AdminController {

    public $data_view = array();
    private $obj_site = NULL;
    private $obj_site_categories = NULL;
    private $obj_site_works = NULL;
    private $obj_validator = NULL;
    private $obj_work_category = NULL;
    private $obj_map_categories = NULL;

    public function __construct() {
        $this->obj_site_categories = new SitesCategories();
        $this->obj_work_category = new WorksCategories();
        $this->obj_map_categories = new MapCategories();
        $this->obj_site_works = new SitesWorks();
        $this->obj_site = new Sites();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

        $params = $request->all();
        $site_id = $request->get('site_id');
        if (!empty($site_id)) {
            $site_name = $this->obj_site->get_site_name($site_id);
        } else {
            $site_name = "";
        }
        $sites_categories = $this->obj_site_categories->get_sites_categories($site_id);
        $this->data_view = array_merge($this->data_view, array(
            'sites_categories' => $sites_categories,
            'site_id' => $site_id,
            'request' => $request,
            'params' => $params,
            'site_name' => $site_name,
        ));
        return view('site::site.admin.site_categories', $this->data_view)
                        ->with('category_parent', $this->obj_work_category->get_categories_parent(0));
    }

    public function post(Request $request) {
        $site_id = $request->get('site_id');
        $sites_categories = $this->obj_site_categories->get_sites_categories($site_id);
        foreach ($sites_categories as $site_categories) {
            $array_work_categories_id = $request->get('map_categories' . $site_categories->site_category_id);
            $this->obj_map_categories->add_map_category($site_categories->site_category_id, $array_work_categories_id);
        }
        $this->data_view = array_merge($this->data_view, array(
            'sites_categories' => $sites_categories,
            'site_id' => $site_id,
            'request' => $request
        ));
        return view('site::site.admin.site_categories', $this->data_view)
                        ->with('category_parent', $this->obj_work_category->get_categories_parent(0));
    }

    public function categoriesCrawler(Request $request) {
        /* $guzzleClient = new GuzzleClient(['base_uri' => 'https://www.vietnamworks.com', 'verify' => false]);
          $client = new GoutteClient();
          $client->setClient($guzzleClient);
          $site_id = 3;
          $crawler = $client->request('GET', 'https://www.vietnamworks.com/tim-viec-lam');
          $crawler->filter('div.list-simple')->each(function($node) use ($site_id, $client) {
          $node->filter('ul > li')->each(function($node) use ($site_id, $client) {
          $input = array();
          $input['site_id'] = $site_id;
          $input['site_category_name'] = $node->filter('a')->text();
          $input['site_category_url'] = $node->filter('a')->link()->getUri();
          $category = $this->obj_site_categories->add_category($input);
          $content = json_decode('{"requests":[{"indexName":"vnw_job_v2_7","params":"query=&hitsPerPage=50&maxValuesPerFacet=20&page=0&facets=%5B%22categoryIds%22%2C%22locationIds%22%2C%22categories%22%2C%22locations%22%2C%22skills%22%2C%22jobLevel%22%2C%22company%22%5D&tagFilters=&facetFilters=%5B%22categoryIds%3A7%22%5D"}]}', true);
          //$content = implode('&', $content);
          $crawler = $client->request('POST', $input['site_category_url'], [
          "requests" => [
          "indexName" => "vnw_job_v2_7",
          "params" => [
          "query" => [
          "hitsPerPage" => "50",
          "maxValuesPerFacet" => "20",
          "page" => "0",
          "facets" => ["categoryIds", "locationIds", "categories", "locations", "skills", "jobLevel", "company"],
          "tagFilters" => "",
          "facetFilters" => ["categoryIds:7"]
          ]
          ]
          ]
          ]);
          //$crawler = $client->request('POST', $input['site_category_url']);
          print $crawler->html();
          $crawler->filter('.job-item')->each(function($node) use ($category) {
          print $node->filter('.bold-red')->text();
          });
          die();
          });
          }); */
        $guzzleClient = new GuzzleClient(['base_uri' => 'https://www.careerlink.vn/', 'verify' => false]);
        $client = new GoutteClient();
        $client->setClient($guzzleClient);
        $site_id = 2;
        $crawler = $client->request('GET', 'https://www.careerlink.vn/');
        $crawler->filter('#search-by-category > ul > li > a')->each(function($node) use ($site_id, $client) {
            $input = array();
            $input['site_id'] = $site_id;
            $temp = $node->filter('a')->text();
            $site_category_name = substr($temp, 0, strpos($temp, '('));
            $input['site_category_name'] = trim($site_category_name);
            $input['site_category_url'] = $node->filter('a')->link()->getUri();
            $category = $this->obj_site_categories->add_category($input);
            $nextpage = true;
            $url = $input['site_category_url'];
            $count = 0;
            while ($nextpage) {
                $crawler = $client->request('GET', $url);
                $crawler->filter('.list-group-item')->each(function($node) use ($client, $category, $count) {
                    $work = array();
                    if (count($node->filter('h2')) > 0) {
                        $count++;
                        var_dump($count);
                        $work['work_name'] = trim($node->filter('h2')->text());
                        $work['work_category'] = $category->site_category_id;
                        $work['work_url'] = $node->filter('h2 > a')->link()->getUri();
                        $crawler = $client->request('GET', $work['work_url']);
                        $work['work_description'] = $crawler->filter('.job-data')->html();
                        //var_dump($work); 
                        $this->obj_site_works->add_work($work);
                    }
                });
                if (count($crawler->filter('.pagination > li > a > .sr-only')) > 0) {
                    $crawler->filter('.pagination > li > a')->each(function($node) use ($url){
                        if (count($node->filter('.sr-only')) > 0) {
                            $url = $node->link()->getUri();
                        }
                    });
                    $nextpage = true;
                } else {
                    $nextpage = false;
                }
            }

            die();
        });
        return Redirect::route("admin_site");
    }

}
