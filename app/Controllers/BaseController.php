<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    protected $session;

    function __construct()
    {

        $this->session = \Config\Services::session();
        $this->session->start();
    }
    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['auth', 'url', 'form', 'text', 'phone', 'custom_helper'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        session();
        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->produkModel = new \App\Models\ProdukModel();
        $this->wisataModel = new \App\Models\WisataModel();
        $this->artikelModel = new \App\Models\ArtikelModel();
        $this->eventModel = new \App\Models\EventModel();
        $this->usersModel = new \App\Models\UsersModel();
        $this->kategoriProdukModel = new \App\Models\KategoriProdukModel();
        $this->kategoriWisataModel = new \App\Models\KategoriWisataModel();
        $this->kategoriWisataModel = new \App\Models\KategoriWisataModel();
        $this->kategoriEventModel = new \App\Models\KategoriEventModel();

        // pemda aplikasi
        // rpjmd
        $this->Rpjmd1621Model = new \App\Models\Rpjmd1621Model();
        $this->Rpjmd2126Model = new \App\Models\Rpjmd2126Model();




        $this->Renstra1621Model = new \App\Models\Renstra1621Model();
        $this->Renstra2126Model = new \App\Models\Renstra2126Model();


        // rkpd
        // $this->Rkpd21Model = new \App\Models\Rkpd21Model();
        // $this->Rkpd22Model = new \App\Models\Rkpd22Model();
        // $this->Rkpd23Model = new \App\Models\Rkpd23Model();
        // $this->Rkpd24Model = new \App\Models\Rkpd24Model();
        // $this->Rkpd25Model = new \App\Models\Rkpd25Model();
        // $this->Rkpd26Model = new \App\Models\Rkpd26Model();
        // master data

        // satuan
        $this->SatuanModel = new \App\Models\SatuanModel();

        // perangkat daerah
        $this->PerangkatDaerahModel = new \App\Models\PerangkatDaerahModel();

        // misi 
        $this->MisiModel = new \App\Models\MisiModel();
        $this->Misi2126Model = new \App\Models\Misi2126Model();

        // ikudanikd
        $this->Ikudanikd1621Model = new \App\Models\Ikudanikd1621Model();
        $this->Ikudanikd2126Model = new \App\Models\Ikudanikd2126Model();

        // kode rekening
        $this->KodeRekeningModel = new \App\Models\KodeRekeningModel();

        // Galeri
        $this->galeriModel = new \App\Models\GaleriModel();

        // Publikasi
        $this->publikasiModel = new \App\Models\PublikasiModel();

        // kolaboratif
        $this->DesaModel = new \App\Models\DesaModel();
        $this->KecamatanModel = new \App\Models\KecamatanModel();

        $this->Sanitasi21Model = new \App\Models\Sanitasi21Model();
        $this->Sbs21Model = new \App\Models\Sbs21Model();
        $this->Persampahan21Model = new \App\Models\Persampahan21Model();
        $this->Kumuh21Model = new \App\Models\Kumuh21Model();
        $this->Tnimd21Model = new \App\Models\Tnimd21Model();
        $this->Rumah21Model = new \App\Models\Rumah21Model();
        // 
        $this->Sanitasi22Model = new \App\Models\Sanitasi22Model();
        $this->Sbs22Model = new \App\Models\Sbs22Model();
        $this->Persampahan21Model = new \App\Models\Persampahan21Model();
        $this->Kumuh21Model = new \App\Models\Kumuh21Model();
        $this->Tnimd21Model = new \App\Models\Tnimd21Model();

        $this->RkpdModel = new \App\Models\RkpdModel();

        $this->session = service('session');
        $this->config = config('Auth');
        $this->auth = service('authentication');
    }
}
