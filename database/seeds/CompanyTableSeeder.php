<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace database\seeds;


use App\Ahk\Company;
use App\Ahk\Repositories\Country\DbCountryRepository;
use App\Ahk\Repositories\Industry\DbIndustryRepository;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompanyTableSeeder extends Seeder
{
	private $popularCompanies =
		[
			['name' => 'ARAMCCO in Germany', 'logo' => 'https://i.ytimg.com/vi/ISYnd8dais8/maxresdefault.jpg', 'country' => 'Germany', 'description' => 'The company Aramcco in Germany is a reliable partner in the procurement of medical professionals for German hospitals or clinics and nursing homes.'],
			['name' => 'EviMed', 'logo' => 'http://proadax.pl/wp-content/uploads/2015/01/evimed3.jpg', 'country' => 'Germany', 'description' => 'A German information service provider in the field of health care. The company offers software for the management of medical patient data. The software provided by evimed supports and automates processes of patient recruitment and feasibility studies as well as monitoring and documentation of clinical trials.'],
			['name' => 'Celesio', 'logo' => 'http://www.celesio.com/image/204/intro/630/420/5b8341fe687e5790baf05b53576947bd/Lx/img---konernzentrale--innenansicht-.jpg', 'country' => 'Germany', 'description' => 'The public limited company Celesio AG situated in Stuttgart is a German healthcare and pharmaceutical company. With 38,000 employees, Celesio operates in 14 countries around the world and generated revenue of more than 22,000 million euros in 2014. The corporation is part of the American McKesson Corporation who has a 76% stake in the company.'],
			['name' => 'Fresenius Medical Care', 'logo' => 'http://www.massdevice.com/wp-content/uploads/files/logos/freseniusmedicalcarelogolarge3x2.jpg', 'country' => 'Germany', 'description' => 'Fresenius Medical Care is a German company specializing in the production of medical supplies, primarily to facilitate or aid renal dialysis. It is 31%-owned by the health care company Fresenius. The company was formed in 1996 from the merger of Fresenius Worldwide Dialysis, then a division of Fresenius, and American company National Medical Care.'],
			['name' => 'Rhön-Klinikum', 'logo' => 'http://images.vcpost.com/data/images/full/12290/rhoen-klinikum-ag.jpg?w=590', 'country' => 'Germany', 'description' => 'Rhön-Klinikum is a German cooperation of hospitals and clinics headquartered in Bad Neustadt an der Saale, Germany. It is a leading private hospital group in Germany.'],
			['name' => 'Siemens Healthcare', 'logo' => 'https://pbs.twimg.com/profile_images/378800000296295875/349d4aa6e1e2afe4482ace28418846fd_400x400.png', 'country' => 'Germany', 'description' => 'Siemens Healthcare (formerly Siemens Medical Solutions, formerly Siemens Medical Systems, internally within Siemens known as "Med") is a supplier to the healthcare industry, and is headquartered in Erlangen, Germany. Currently, its U.S. business, Siemens Medical Solutions USA, Inc., is a Delaware corporation, with headquarters in Malvern, Pennsylvania. The Ultrasound Group is located in Issaquah, Washington.'],
			['name' => 'VITA Zahnfabrik', 'logo' => 'http://www.zwp-online.info/sites/default/files/unternehmen/profilbild/284x200_17.jpg', 'country' => 'Germany', 'description' => 'VITA Zahnfabrik H. Rauter GmbH & Co. KG (abbreviated as “VITA”) is a German family-run dental technology company with a long history that offers a wide range of products and systems for both dental practices and dental laboratories. The name VITA (from the Latin term vita meaning “life”) reflects the company\'s objective of creating products that are as natural and “lifelike” in appearance as natural dentition itself.'],
			['name' => 'Lavipharm', 'logo' => 'http://www.ygeiaonline.gr/images/stories/Diatrofi/diatrofi_astheneia/lavipharm_valeant.jpg', 'country' => 'Greece', 'description' => 'Lavipharm S.A. was founded in 1911 and is the largest integrated Greek pharmaceutical company that develops, manufactures, markets and distributes pharmaceutical, cosmetic, veterinary and consumer health products in Greece and internationally (France, Cyprus and the United States).'],
			['name' => 'Vianex S.A.', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/9/97/VianexLogoWiki.jpg', 'country' => 'Greece', 'description' => 'Vianex S.A. (Greek: Βιανεξ Α.Ε.) is a Greek pharmaceutical company, founded in 1971 by the Giannakopoulos’ family that has been involved with the pharmaceutical industry since 1924.'],
			['name' => 'ELPEN', 'logo' => 'http://www.elpen.gr/admin/files/images/Elpen50years%CE%A4%CE%B5%CF%84%CF%81%CE%AC%CE%B3%CF%89%CE%BD%CE%BF.jpg', 'country' => 'Greece', 'description' => 'ELPEN is a leading pharmaceutical company that specializes in branded generics, and original pharmaceuticals obtained through many important collaborations with multinational companies.'],
			['name' => 'Pharmathen', 'logo' => 'http://www.exportleaders.gr/userfiles/suggestions/pharmathlen_1846737740.jpg', 'country' => 'Greece', 'description' => 'Pharmathen was founded in 1969 in Athens, as a private pharmaceutical company, and is focused on the development and marketing of pharmaceuticals, with a strong position in generics. With 3 state of the art research laboratories and 2 manufacturing units, Pharmathen is a completely vertically integrated company and its activities extend from the development of pharmaceutical products up to their distribution.'],
		];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$industries = (new DbIndustryRepository())->all()->get()->toArray();
		$countries = (new DbCountryRepository())->all()->toArray();
		$faker = Factory::create();

		foreach ($this->popularCompanies as $company)
		{
			factory(Company::class, 'without_relations')
				->create([
					'name'        => $company['name'],
					'slug'        => Str::slug($company['name']),
					'description' => $company['description'],
					'logo'        => $company['logo'],
					'industry_id' => $faker->randomElement($industries)['id'],
					'country_id'  => $faker->randomElement($countries)['id'],
				]);
		}
	}
}