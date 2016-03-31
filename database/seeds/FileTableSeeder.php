<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */
namespace database\seeds;

use App\Ahk\File;
use App\Ahk\Repositories\Company\DbCompanyRepository;
use App\Ahk\Repositories\Decision\DbDecisionRepository;
use App\Ahk\Repositories\Event\DbEventRepository;
use Illuminate\Database\Seeder;

/**
 * Class FileTableSeeder.
 */
class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dbCompanyRepository = new DbCompanyRepository();
        $dbEventRepository = new DbEventRepository();
        $dbDecisionRepository = new DbDecisionRepository();

        foreach ($dbCompanyRepository->all() as $event) {
            $files = factory(File::class, 2)->create();

            $dbCompanyRepository->assignFiles($event, $files);
        }

        foreach ($dbEventRepository->all() as $event) {
            $files = factory(File::class, 2)->create();

            $dbEventRepository->assignFiles($event, $files);
        }

        foreach ($dbDecisionRepository->all() as $decision) {
            $file = factory(File::class)->create();

            $dbDecisionRepository->assignFile($decision, $file);
        }
    }
}
