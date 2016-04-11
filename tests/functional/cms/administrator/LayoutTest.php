<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */
namespace tests\functional\cms\administrator;

use App\Ahk\Helpers\Utilities;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use tests\TestCase;

/**
 * Class LayoutTest.
 */
class LayoutTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_reads_sidebar()
    {
        $administrator = factory(User::class)->create();

        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $this->actingAs($administrator)
            ->visit(route('cms.dashboard'))
            ->see('<li class="header">'.trans('cms.main_navigation').'</li>')
            ->see('<span>'.trans('cms.users').'</span>')
            ->see('<i class="fa fa-users"></i> '.trans('cms.subscribers'))
            ->see('<i class="fa fa-users"></i> '.trans('cms.administrators'))
            ->see('<i class="fa fa-newspaper-o"></i> <span>'.trans('cms.articles'))
            ->see('<i class="fa fa-list"></i> '.trans('cms.published'))
            ->see('<i class="fa fa-archive"></i> '.trans('cms.unpublished'))
            ->see('<i class="fa fa-plus"></i> '.trans('cms.create'))
            ->see('<i class="fa fa-puzzle-piece"></i> '.trans('cms.categories'))
            ->see('<i class="fa fa-tags"></i> '.trans('cms.tags'))
            ->see('<i class="fa fa-building"></i> <span>'.trans('cms.companies'));
    }

    /** @test */
    public function it_reads_header()
    {
        $administrator = factory(User::class)->create();

        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $this->actingAs($administrator)
            ->visit(route('cms.dashboard'))
            ->see('<span class="logo-mini"><b>C</b>C</span>')
            ->see('<span class="logo-lg"><b>Cms</b>Chamber</span> </a>')
            ->see('<img src="'.$administrator->avatar_url.'" class="user-image" alt="User Image">')
            ->see('<span class="hidden-xs">'.$administrator->name or $administrator->username.'</span> </a>')
            ->see('<small>Member since '.$administrator->created_at.'</small>')
            ->see('<button type="submit" class="btn btn-default btn-flat">'.trans('ahk.logout').'</button>');
    }

    /** @test */
    public function it_reads_footer()
    {
        $utilities = new Utilities();
        $administrator = factory(User::class)->create();

        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );

        $this->actingAs($administrator)
            ->visit(route('cms.dashboard'))
            ->see('<strong>Copyright &copy; '.$utilities->autoCopyright('2015'))
            ->see('<a href="'.route('home_path').'">Chamb.Net</a>.</strong> '.trans('cms.all_rights_reserved'))
            ->see('<img src="'.$administrator->avatar_url.'" class="user-image" alt="User Image">')
            ->see('<span class="hidden-xs">'.$administrator->name or $administrator->username.'</span> </a>')
            ->see('<small>Member since '.$administrator->created_at.'</small>')
            ->see('<button type="submit" class="btn btn-default btn-flat">'.trans('ahk.logout').'</button>');
    }
}
