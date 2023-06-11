<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ceklogin();
        $this->load->model("m_user");
        $this->load->model("m_skw");
        $this->load->model("m_resort");
        $this->load->model("m_kawasan");
        $this->load->model("m_laporan");
        $this->load->model("m_satwa");
        $this->load->model("m_dashboard");
        $this->load->model("m_dokumen");
        $this->load->model("m_pengaturan");
        $this->load->model("m_kee");
        $this->load->model("m_penangkar");
        $this->load->model("m_pengedar");
        $this->load->model("m_lemkon");
        $this->load->model("m_izinTsl");
    }

    // Dashboard
    public function index()
    {
        $variabel['csrf'] = csrf();
        $variabel['tahun']  = date('Y');
        $username = $this->session->userdata("username");
        $rule = $this->session->userdata("rule");
        if ($rule == "user") {
            $variabel['jumlahlaporan']  = $this->m_dashboard->jumlahlaporanuser($username);
            $variabel['jumlahlaporantolak']  = $this->m_dashboard->jumlahlaporantolakuser($username);
            $variabel['jumlahlaporanmenunggu']  = $this->m_dashboard->jumlahlaporanmenungguuser($username);
            $variabel['jumlahlaporanvalid']  = $this->m_dashboard->jumlahlaporanvaliduser($username);
            $variabel['jumlahskw']  = $this->m_dashboard->jumlahskwuser($username);
            $variabel['jumlahkawasan']  = $this->m_dashboard->jumlahkawasanuser($username);
            $variabel['jumlahresort']  = $this->m_dashboard->jumlahresortuser($username);

            $variabel['kawasan'] = $this->m_kawasan->lihatdata();
            $variabel['skw'] = $this->m_skw->lihatdata();
            $variabel['resort'] = $this->m_resort->lihatdata();

            $variabel['jenis']  = $this->m_dashboard->laporanjenisuser($username);
            $variabel['laporankawasan']  = $this->m_dashboard->laporankawasanuser($username);
            $this->load->view('dashboard/v_home', $variabel);
        } else if ($rule == "guest") {

            $variabel['jumlahskw']  = $this->m_dashboard->jumlahskw();
            $variabel['jumlahkawasan']  = $this->m_dashboard->jumlahkawasan();
            $variabel['jumlahresort']  = $this->m_dashboard->jumlahresort();
            $variabel['kawasan'] = $this->m_kawasan->lihatdata();
            $variabel['skw'] = $this->m_skw->lihatdata();
            $variabel['resort'] = $this->m_resort->lihatdata();
            $this->load->view('dashboard/v_homeguest', $variabel);
        } else {

            $variabel['jumlahlaporan']  = $this->m_dashboard->jumlahlaporan();
            $variabel['jumlahlaporantolak']  = $this->m_dashboard->jumlahlaporantolak();
            $variabel['jumlahlaporanmenunggu']  = $this->m_dashboard->jumlahlaporanmenunggu();
            $variabel['jumlahlaporanvalid']  = $this->m_dashboard->jumlahlaporanvalid();
            $variabel['jumlahskw']  = $this->m_dashboard->jumlahskw();
            $variabel['jumlahkawasan']  = $this->m_dashboard->jumlahkawasan();
            $variabel['jumlahresort']  = $this->m_dashboard->jumlahresort();

            $variabel['kawasan'] = $this->m_kawasan->lihatdata();
            $variabel['skw'] = $this->m_skw->lihatdata();
            $variabel['resort'] = $this->m_resort->lihatdata();

            $variabel['jenis']  = $this->m_dashboard->laporanjenis();
            $variabel['laporankawasan']  = $this->m_dashboard->laporankawasan();
            $this->load->view('dashboard/v_home', $variabel);
        }
    }

    public function skw()
    {
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_skw->lihatdata();
        $this->layout->render('skw/v_skw', $variabel, 'skw/v_skw_js');
    }


    public function skwtambah()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'namawilayah' => $this->input->post('namawilayah'),
                'lintang' => $this->input->post('lintang'),
                'bujur' => $this->input->post('bujur'),

            );
            $config['upload_path'] = './assets/images/sk';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DOC';
            $this->load->library('upload', $config);
            $this->upload->do_upload("sk");
            $upload = $this->upload->data();
            $file = $upload["raw_name"] . $upload["file_ext"];
            $array['sk'] = $file;


            $exec = $this->m_skw->tambahdata($array);
            if ($exec) {
                redirect(base_url("app/skw?msg=1"));
            } else redirect(base_url("app/skw?msg=0"));
        } else {
        }
    }

    public function skwhapus()
    {
        $id_skw = $this->input->get("id");
        $query2 = $this->m_skw->lihatdatasatu($id_skw);
        $row2 = $query2->row();
        $berkas1temp = $row2->sk;
        $path1 = './assets/images/sk/' . $berkas1temp . '';
        if (is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_skw->hapus($id_skw);
        redirect(base_url() . "app/skw?msg=0");
    }
    public function skwlihat()
    {
        $variabel['csrf'] = csrf();

        $polygon = $this->m_pengaturan->lihatdatasatu("1")->row_array();
        $variabel['poligon'] =  $polygon['poligon'];

        $id_skw = $this->input->get("id");
        $exec = $this->m_skw->lihatdatasatu($id_skw);
        if ($exec->num_rows() > 0) {
            $variabel['data'] = $exec->row_array();
            $this->layout->render('skw/v_skw_lihat', $variabel, 'skw/v_skw_lihat_js');
        } else {
            redirect(base_url("app/skw"));
        }
    }

    public function skwedit()
    {
        $variabel['csrf'] = csrf();
        $id_skw = $this->input->post("id_skw");
        $variabel['data'] = $this->m_skw->lihatdatasatu($id_skw)->row_array();
        $this->load->view("skw/v_skw_edit", $variabel);
    }

    public function skweditproses()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'namawilayah' => $this->input->post('namawilayah'),
                'lintang' => $this->input->post('lintang'),
                'bujur' => $this->input->post('bujur'),
                'kepala' => $this->input->post('kepala'),
                'kontak' => $this->input->post('kontak'),
                'keterangan' => $this->input->post('keterangan'),
            );

            $id_skw = $this->input->post("id_skw");

            $config['upload_path'] = './assets/images/sk';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DO|docx|DOCX';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("sk")) {
                $upload = $this->upload->data();
                $sk = $upload["raw_name"] . $upload["file_ext"];
                $array['sk'] = $sk;
                $query2 = $this->m_skw->lihatdatasatu($id_skw);
                $row2 = $query2->row();
                $berkas1temp = $row2->sk;
                $path1 = './assets/images/sk/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1);
                }
            }


            $config['upload_path'] = './assets/images/foto';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->upload->initialize($config);
            if ($this->upload->do_upload("foto")) {
                $upload = $this->upload->data();
                $foto = $upload["raw_name"] . $upload["file_ext"];
                $array['foto'] = $foto;

                $query2 = $this->m_skw->lihatdatasatu($id_skw);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/foto/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder user
                }
            } else if ($this->input->post('foto') == "") {
                $query2 = $this->m_skw->lihatdatasatu($id_skw);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/foto/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder halaman
                }
                $array['foto'] = "";
            }





            $exec = $this->m_skw->editdata($id_skw, $array);
            if ($exec) {
                redirect(base_url("app/skw?msg=3"));
            }
        } else {
        }
    }


    public function resort()
    {
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_resort->lihatdata();
        $variabel['skw'] = $this->m_skw->lihatdata();
        $this->layout->render('resort/v_resort', $variabel, 'resort/v_resort_js');
    }


    public function resorttambah()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'namaresort' => $this->input->post('namaresort'),
                'id_skw' => $this->input->post('id_skw'),
                'lintang' => $this->input->post('lintang'),
                'bujur' => $this->input->post('bujur'),
            );
            $exec = $this->m_resort->tambahdata($array);
            if ($exec) {
                redirect(base_url("app/resort?msg=1"));
            } else redirect(base_url("app/resort?msg=0"));
        } else {
        }
    }

    public function resorthapus()
    {
        $id_resort = $this->input->get("id");
        $exec = $this->m_resort->hapus($id_resort);
        redirect(base_url() . "app/resort?msg=0");
    }
    public function resortlihat()
    {
        $variabel['csrf'] = csrf();

        $polygon = $this->m_pengaturan->lihatdatasatu("1")->row_array();
        $variabel['poligon'] =  $polygon['poligon'];

        $id_resort = $this->input->get("id");
        $exec = $this->m_resort->lihatdatasatu($id_resort);
        if ($exec->num_rows() > 0) {
            $variabel['data'] = $exec->row_array();
            $this->layout->render('resort/v_resort_lihat', $variabel, 'resort/v_resort_lihat_js');
        } else {
            redirect(base_url("app/resort"));
        }
    }

    public function resortedit()
    {
        $variabel['csrf'] = csrf();
        $id_resort = $this->input->post("id_resort");
        $variabel['skw'] = $this->m_skw->lihatdata();
        $variabel['data'] = $this->m_resort->lihatdatasatu($id_resort)->row_array();
        $this->load->view("resort/v_resort_edit", $variabel);
    }

    public function resorteditproses()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'namaresort' => $this->input->post('namaresort'),
                'id_skw' => $this->input->post('id_skw'),
                'lintang' => $this->input->post('lintang'),
                'bujur' => $this->input->post('bujur'),
                'kepala' => $this->input->post('kepala'),
                'kontak' => $this->input->post('kontak'),
                'keterangan' => $this->input->post('keterangan'),
            );
            $id_resort = $this->input->post("id_resort");
            $config['upload_path'] = './assets/images/foto';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto")) {
                $upload = $this->upload->data();
                $foto = $upload["raw_name"] . $upload["file_ext"];
                $array['foto'] = $foto;

                $query2 = $this->m_resort->lihatdatasatu($id_resort);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/foto/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder user
                }
            } else if ($this->input->post('foto') == "") {
                $query2 = $this->m_resort->lihatdatasatu($id_resort);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/foto/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder halaman
                }
                $array['foto'] = "";
            }



            $exec = $this->m_resort->editdata($id_resort, $array);
            if ($exec) {
                redirect(base_url("app/resort?msg=3"));
            }
        } else {
        }
    }

    public function kawasan()
    {
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_kawasan->lihatdata();
        $variabel['skw'] = $this->m_skw->lihatdata();
        $this->layout->render('kawasan/v_kawasan', $variabel, 'kawasan/v_kawasan_js');
    }


    public function kawasantambah()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'namakawasan' => $this->input->post('namakawasan'),
                'id_skw' => $this->input->post('id_skw'),
                'lintang' => $this->input->post('lintang'),
                'bujur' => $this->input->post('bujur'),
            );
            $config['upload_path'] = './assets/images/sk';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DOC';
            $this->load->library('upload', $config);
            $this->upload->do_upload("sk");
            $upload = $this->upload->data();
            $file = $upload["raw_name"] . $upload["file_ext"];
            $array['sk'] = $file;
            $exec = $this->m_kawasan->tambahdata($array);
            if ($exec) {
                redirect(base_url("app/kawasan?msg=1"));
            } else redirect(base_url("app/kawasan?msg=0"));
        } else {
        }
    }

    public function kawasanhapus()
    {
        $id_kawasan = $this->input->get("id");
        $query2 = $this->m_kawasan->lihatdatasatu($id_kawasan);
        $row2 = $query2->row();
        $berkas1temp = $row2->sk;
        $path1 = './assets/images/sk/' . $berkas1temp . '';
        if (is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_kawasan->hapus($id_kawasan);
        redirect(base_url() . "app/kawasan?msg=0");
    }
    public function kawasanlihat()
    {


        $variabel['csrf'] = csrf();

        $polygon = $this->m_pengaturan->lihatdatasatu("1")->row_array();
        $variabel['poligon'] =  $polygon['poligon'];

        $id_kawasan = $this->input->get("id");
        $exec = $this->m_kawasan->lihatdatasatu($id_kawasan);

        if ($exec->num_rows() > 0) {
            $variabel['data'] = $exec->row_array();
            $variabel['data2'] = $this->m_dokumen->lihatdatadokumen($id_kawasan);
            $variabel['satwa'] = $this->m_laporan->lihatdatakategori("Satwa Liar", "Tervalidasi", $id_kawasan);
            $variabel['tumbuhan'] = $this->m_laporan->lihatdatakategori("Tumbuhan", "Tervalidasi", $id_kawasan);
            $variabel['wisata'] = $this->m_laporan->lihatdatakategori("Wisata Alam", "Tervalidasi", $id_kawasan);
            $variabel['desa'] = $this->m_laporan->lihatdatakategori("Sosial Ekonomi", "Tervalidasi", $id_kawasan);
            $variabel['area'] = $this->m_laporan->lihatdatakategori("Area Terbuka/Open Area", "Tervalidasi", $id_kawasan);
            $this->layout->render('kawasan/v_kawasan_lihat', $variabel, 'kawasan/v_kawasan_lihat_js');
        } else {
            redirect(base_url("app"));
        }
    }

    public function kawasanedit()
    {
        $variabel['csrf'] = csrf();
        $id_kawasan = $this->input->post("id_kawasan");
        $variabel['skw'] = $this->m_skw->lihatdata();
        $variabel['data'] = $this->m_kawasan->lihatdatasatu($id_kawasan)->row_array();
        $this->load->view("kawasan/v_kawasan_edit", $variabel);
    }

    public function kawasaneditproses()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'namakawasan' => $this->input->post('namakawasan'),
                'id_skw' => $this->input->post('id_skw'),
                'lintang' => $this->input->post('lintang'),
                'bujur' => $this->input->post('bujur'),
            );

            $id_kawasan = $this->input->post("id_kawasan");

            $config['upload_path'] = './assets/images/sk';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DO|docx|DOCX';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("sk")) {
                $upload = $this->upload->data();
                $sk = $upload["raw_name"] . $upload["file_ext"];
                $array['sk'] = $sk;
                $query2 = $this->m_kawasan->lihatdatasatu($id_kawasan);
                $row2 = $query2->row();
                $berkas1temp = $row2->sk;
                $path1 = './assets/images/sk/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1);
                }
            }

            $exec = $this->m_kawasan->editdata($id_kawasan, $array);
            if ($exec) {
                redirect(base_url("app/kawasan?msg=3"));
            }
        } else {
        }
    }


    public function editkawasan()
    {

        $variabel['csrf'] = csrf();
        $id_kawasan = $this->input->get("id");
        $aktif = $this->input->get("tab") ? $this->input->get("tab") : "profil";
        $variabel['skw'] = $this->m_skw->lihatdata();
        $exec = $this->m_kawasan->lihatdatasatu($id_kawasan);
        if ($exec->num_rows() > 0) {
            $variabel['data'] = $exec->row_array();
            $variabel['aktif'] = $aktif;
            $variabel['data2'] = $this->m_dokumen->lihatdatadokumen($id_kawasan);
            $this->layout->render('kawasan/v_editkawasan', $variabel, 'kawasan/v_editkawasan_js');
        } else {
            redirect(base_url("app"));
        }
    }

    public function editkawasandokumen()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $id_kawasan = $this->input->post('id_kawasan');
            $array = array(
                'judul' => $this->input->post('judul'),
                'id_kawasan' => $id_kawasan,
                'author' => $this->input->post('author'),
                'tahun' => $this->input->post('tahun'),
            );

            $config['upload_path'] = './assets/images/dokumen';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DOC|docs|DOCS';
            $this->load->library('upload', $config);
            $this->upload->do_upload("dokumen");
            $upload = $this->upload->data();
            $file = $upload["raw_name"] . $upload["file_ext"];
            $array['dokumen'] = $file;
            $exec = $this->m_dokumen->tambahdata($array);
            $tab = "dokumen";
            if ($exec) redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgdokumen=1&tab=" . $tab));
            else redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgdokumen=0&tab=" . $tab));
        } else {
        }
    }

    public function dokumenhapus()
    {
        $id_dokumen = $this->input->get("id");
        $query2 = $this->m_dokumen->lihatdatasatu($id_dokumen);
        $row2 = $query2->row();
        $berkas1temp = $row2->dokumen;
        $path1 = './assets/images/dokumen/' . $berkas1temp . '';
        if (is_file($path1)) {
            unlink($path1);
        }
        $id_kawasan = $row2->id_kawasan;
        $exec = $this->m_dokumen->hapus($id_dokumen);
        $tab = "dokumen";
        if ($exec) redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgprofil=2&tab=" . $tab));
        else redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgprofil=0&tab=" . $tab));
    }

    public function editkawasanprofil()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'namakawasan' => $this->input->post('namakawasan'),
                'id_skw' => $this->input->post('id_skw'),
                'lintang' => $this->input->post('lintang'),
                'bujur' => $this->input->post('bujur'),
                'fungsi' => $this->input->post('fungsi'),
                'nosk' => $this->input->post('nosk'),
                'tanggalsk' => tanggalawal($this->input->post('tanggalsk')),
                'letakadmin' => $this->input->post('letakadmin'),
                'luas' => $this->input->post('luas'),
                'sejarah' => $this->input->post('sejarah'),
                'akses' => $this->input->post('akses'),
                'sejarah' => $this->input->post('sejarah'),
                'statushukum' => $this->input->post('statushukum'),
            );
            $id_kawasan = $this->input->post("id_kawasan");
            $config['upload_path'] = './assets/images/sk';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DO|docx|DOCX';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("sk")) {
                $upload = $this->upload->data();
                $sk = $upload["raw_name"] . $upload["file_ext"];
                $array['sk'] = $sk;
                $query2 = $this->m_kawasan->lihatdatasatu($id_kawasan);
                $row2 = $query2->row();
                $berkas1temp = $row2->sk;
                $path1 = './assets/images/sk/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1);
                }
            }
            $tab = "profil";
            $exec = $this->m_kawasan->editdata($id_kawasan, $array);
            if ($exec) redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgprofil=1&tab=" . $tab));
            else redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgprofil=0&tab=" . $tab));
        } else {
            redirect(base_url("app"));
        }
    }

    public function editkawasanekosistem()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'asli_ekosistem' => $this->input->post('asli_ekosistem'),
                'kaya_ekosistem' => $this->input->post('kaya_ekosistem'),
                'wakil_ekosistem' => $this->input->post('wakil_ekosistem'),
                'utuh_ekosistem' => $this->input->post('utuh_ekosistem'),
                'gantung_ekosistem' => $this->input->post('gantung_ekosistem'),
                'unik_ekosistem' => $this->input->post('unik_ekosistem'),
                'rentan_ekosistem' => $this->input->post('rentan_ekosistem'),
                'produk_ekosistem' => $this->input->post('produk_ekosistem'),
                'karakter_ekosistem' => $this->input->post('karakter_ekosistem'),
                'fungsi_ekosistem' => $this->input->post('fungsi_ekosistem'),
                'khas_ekosistem' => $this->input->post('khas_ekosistem'),
                'langka_ekosistem' => $this->input->post('langka_ekosistem'),
                'jenistanah_ekosistem' => $this->input->post('jenistanah_ekosistem'),
                'geologi_ekosistem' => $this->input->post('geologi_ekosistem'),
                'ketinggian_ekosistem' => $this->input->post('ketinggian_ekosistem'),
                'kelerengan_ekosistem' => $this->input->post('kelerengan_ekosistem'),
                'bentangalam_ekosistem' => $this->input->post('bentangalam_ekosistem'),
                'gejalaalam_ekosistem' => $this->input->post('gejalaalam_ekosistem')
            );
            $id_kawasan = $this->input->post("id_kawasan");
            $tab = "ekosistem";
            $exec = $this->m_kawasan->editdata($id_kawasan, $array);
            if ($exec) redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgekosistem=1&tab=" . $tab));
            else redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgekosistem=0&tab=" . $tab));
        } else {
            redirect(base_url("app"));
        }
    }

    public function editkawasansatwa()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'satwa' => $this->input->post('satwa')
            );
            $id_kawasan = $this->input->post("id_kawasan");
            $tab = "satwa";
            $exec = $this->m_kawasan->editdata($id_kawasan, $array);
            if ($exec) redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgsatwa=1&tab=" . $tab));
            else redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgsatwa=0&tab=" . $tab));
        } else {
            redirect(base_url("app"));
        }
    }

    public function editkawasantumbuhan()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'tumbuhan' => $this->input->post('tumbuhan')
            );
            $id_kawasan = $this->input->post("id_kawasan");
            $tab = "tumbuhan";
            $exec = $this->m_kawasan->editdata($id_kawasan, $array);
            if ($exec) redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgtumbuhan=1&tab=" . $tab));
            else redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgtumbuhan=0&tab=" . $tab));
        } else {
            redirect(base_url("app"));
        }
    }

    public function editkawasanwisata()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'wisata' => $this->input->post('wisata')
            );
            $id_kawasan = $this->input->post("id_kawasan");
            $tab = "wisata";
            $exec = $this->m_kawasan->editdata($id_kawasan, $array);
            if ($exec) redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgwisata=1&tab=" . $tab));
            else redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgwisata=0&tab=" . $tab));
        } else {
            redirect(base_url("app"));
        }
    }

    public function editkawasanpotensi()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'sumberekonomi' => $this->input->post('sumberekonomi'),
                'perkembanganusaha' => $this->input->post('perkembanganusaha'),
                'investasi' => $this->input->post('investasi'),
                'ketergantunganmasyarakat' => $this->input->post('ketergantunganmasyarakat'),
                'saranaprasarana' => $this->input->post('saranaprasarana'),
                'rencanapembangunan' => $this->input->post('rencanapembangunan'),
                'sejarahpemukiman' => $this->input->post('sejarahpemukiman'),
                'perkembangandemografi' => $this->input->post('perkembangandemografi'),
                'kearifantradisional' => $this->input->post('kearifantradisional'),
                'kelembagaan' => $this->input->post('kelembagaan'),
                'adatistiadat' => $this->input->post('adatistiadat'),
                'persepsimasyarakat' => $this->input->post('persepsimasyarakat'),
                'persepsipemerintah' => $this->input->post('persepsipemerintah')
            );
            $id_kawasan = $this->input->post("id_kawasan");
            $tab = "potensi";
            $exec = $this->m_kawasan->editdata($id_kawasan, $array);
            if ($exec) redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgpotensi=1&tab=" . $tab));
            else redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgpotensi=0&tab=" . $tab));
        } else {
            redirect(base_url("app"));
        }
    }

    public function editkawasandesa()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'desa' => $this->input->post('desa')
            );
            $id_kawasan = $this->input->post("id_kawasan");
            $tab = "desa";
            $exec = $this->m_kawasan->editdata($id_kawasan, $array);
            if ($exec) redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgdesa=1&tab=" . $tab));
            else redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgdesa=0&tab=" . $tab));
        } else {
            redirect(base_url("app"));
        }
    }

    public function editkawasanarea()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'area' => $this->input->post('area')
            );
            $id_kawasan = $this->input->post("id_kawasan");
            $tab = "area";
            $exec = $this->m_kawasan->editdata($id_kawasan, $array);
            if ($exec) redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgarea=1&tab=" . $tab));
            else redirect(base_url("app/editkawasan?id=" . $id_kawasan . "&msgarea=0&tab=" . $tab));
        } else {
            redirect(base_url("app"));
        }
    }




    public function eksplor()
    {
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_kawasan->lihatdata();
        $variabel['skw'] = $this->m_skw->lihatdata();

        $polygon = $this->m_pengaturan->lihatdatasatu("1")->row_array();
        $variabel['poligon'] =  $polygon['poligon'];

        $this->layout->render('eksplor/v_eksplor', $variabel, 'eksplor/v_eksplor_js');
    }

    public function inputpal()
    {

        $variabel['csrf'] = csrf();
        $variabel['kawasan'] = $this->m_kawasan->lihatdata();
        if ($this->input->post()) {
            $username = $this->session->userdata("username");
            $array = array(
                'id_kawasan' => $this->input->post('id_kawasan'),
                'kategori' => $this->input->post('kategori'),
                'kegiatan' => $this->input->post('kegiatan'),
                'lintang' => $this->input->post('lintang'),
                'bujur' => $this->input->post('bujur'),
                'petugas' => $this->input->post('petugas'),
                'waktu' => tanggalawal($this->input->post('waktu')),
                'keterangan' => $this->input->post('keterangan'),
                'data1' => $this->input->post('data1'),
                'data2' => $this->input->post('data2'),
                'data3' => $this->input->post('data3'),
                'validasi' => "Menunggu Validasi",
                'username' => $username
            );
            $config['upload_path'] = './assets/images/laporan';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            $this->upload->do_upload("foto");
            $upload = $this->upload->data();
            $file = $upload["raw_name"] . $upload["file_ext"];
            $array['foto'] = $file;
            $exec = $this->m_laporan->tambahdata($array);
            if ($exec) redirect(base_url("app/inputpal?msg=1"));
            else redirect(base_url("app/inputpal?msg=0"));
        } else {
            $this->layout->render('laporan/v_pal', $variabel, 'laporan/v_pal_js');
        }
    }

    public function inputarea()
    {

        $variabel['csrf'] = csrf();
        $variabel['kawasan'] = $this->m_kawasan->lihatdata();
        if ($this->input->post()) {
            $username = $this->session->userdata("username");
            $array = array(
                'id_kawasan' => $this->input->post('id_kawasan'),
                'kategori' => $this->input->post('kategori'),
                'kegiatan' => $this->input->post('kegiatan'),
                'lintang' => $this->input->post('lintang'),
                'bujur' => $this->input->post('bujur'),
                'petugas' => $this->input->post('petugas'),
                'waktu' => tanggalawal($this->input->post('waktu')),
                'keterangan' => $this->input->post('keterangan'),
                'data1' => $this->input->post('data1'),
                'data2' => $this->input->post('data2'),
                'data3' => $this->input->post('data3'),
                'data4' => $this->input->post('data4'),
                'validasi' => "Menunggu Validasi",
                'username' => $username
            );
            $config['upload_path'] = './assets/images/laporan';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            $this->upload->do_upload("foto");
            $upload = $this->upload->data();
            $file = $upload["raw_name"] . $upload["file_ext"];
            $array['foto'] = $file;
            $exec = $this->m_laporan->tambahdata($array);
            if ($exec) redirect(base_url("app/inputarea?msg=1"));
            else redirect(base_url("app/inputarea?msg=0"));
        } else {
            $this->layout->render('laporan/v_area', $variabel, 'laporan/v_area_js');
        }
    }

    public function inputsatwa()
    {

        $variabel['csrf'] = csrf();
        $variabel['kawasan'] = $this->m_kawasan->lihatdata();
        if ($this->input->post()) {
            $username = $this->session->userdata("username");
            $array = array(
                'id_kawasan' => $this->input->post('id_kawasan'),
                'kategori' => $this->input->post('kategori'),
                'kegiatan' => $this->input->post('kegiatan'),
                'lintang' => $this->input->post('lintang'),
                'bujur' => $this->input->post('bujur'),
                'petugas' => $this->input->post('petugas'),
                'waktu' => tanggalawal($this->input->post('waktu')),
                'keterangan' => $this->input->post('keterangan'),
                'data1' => $this->input->post('data1'),
                'data2' => $this->input->post('data2'),
                'data3' => $this->input->post('data3'),
                'data4' => $this->input->post('data4'),
                'data5' => $this->input->post('data5'),
                'data6' => $this->input->post('data6'),
                'data7' => $this->input->post('data7'),
                'data8' => $this->input->post('data8'),
                'validasi' => "Menunggu Validasi",
                'username' => $username
            );
            $config['upload_path'] = './assets/images/laporan';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            $this->upload->do_upload("foto");
            $upload = $this->upload->data();
            $file = $upload["raw_name"] . $upload["file_ext"];
            $array['foto'] = $file;
            $exec = $this->m_laporan->tambahdata($array);
            if ($exec) redirect(base_url("app/inputsatwa?msg=1"));
            else redirect(base_url("app/inputsatwa?msg=0"));
        } else {
            $this->layout->render('laporan/v_satwa', $variabel, 'laporan/v_satwa_js');
        }
    }

    public function inputtumbuhan()
    {

        $variabel['csrf'] = csrf();
        $variabel['kawasan'] = $this->m_kawasan->lihatdata();
        if ($this->input->post()) {
            $username = $this->session->userdata("username");
            $array = array(
                'id_kawasan' => $this->input->post('id_kawasan'),
                'kategori' => $this->input->post('kategori'),
                'kegiatan' => $this->input->post('kegiatan'),
                'lintang' => $this->input->post('lintang'),
                'bujur' => $this->input->post('bujur'),
                'petugas' => $this->input->post('petugas'),
                'waktu' => tanggalawal($this->input->post('waktu')),
                'keterangan' => $this->input->post('keterangan'),
                'data1' => $this->input->post('data1'),
                'data2' => $this->input->post('data2'),
                'data3' => $this->input->post('data3'),
                'data4' => $this->input->post('data4'),
                'data5' => $this->input->post('data5'),
                'validasi' => "Menunggu Validasi",
                'username' => $username
            );
            $config['upload_path'] = './assets/images/laporan';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            $this->upload->do_upload("foto");
            $upload = $this->upload->data();
            $file = $upload["raw_name"] . $upload["file_ext"];
            $array['foto'] = $file;
            $exec = $this->m_laporan->tambahdata($array);
            if ($exec) redirect(base_url("app/inputtumbuhan?msg=1"));
            else redirect(base_url("app/inputtumbuhan?msg=0"));
        } else {
            $this->layout->render('laporan/v_tumbuhan', $variabel, 'laporan/v_tumbuhan_js');
        }
    }

    public function inputwisata()
    {

        $variabel['csrf'] = csrf();
        $variabel['kawasan'] = $this->m_kawasan->lihatdata();
        if ($this->input->post()) {
            $username = $this->session->userdata("username");
            $array = array(
                'id_kawasan' => $this->input->post('id_kawasan'),
                'kategori' => $this->input->post('kategori'),
                'kegiatan' => $this->input->post('kegiatan'),
                'lintang' => $this->input->post('lintang'),
                'bujur' => $this->input->post('bujur'),
                'petugas' => $this->input->post('petugas'),
                'waktu' => tanggalawal($this->input->post('waktu')),
                'keterangan' => $this->input->post('keterangan'),
                'data1' => $this->input->post('data1'),
                'validasi' => "Menunggu Validasi",
                'username' => $username
            );
            $config['upload_path'] = './assets/images/laporan';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            $this->upload->do_upload("foto");
            $upload = $this->upload->data();
            $file = $upload["raw_name"] . $upload["file_ext"];
            $array['foto'] = $file;
            $exec = $this->m_laporan->tambahdata($array);
            if ($exec) redirect(base_url("app/inputwisata?msg=1"));
            else redirect(base_url("app/inputwisata?msg=0"));
        } else {
            $this->layout->render('laporan/v_wisata', $variabel, 'laporan/v_wisata_js');
        }
    }
    public function inputgangguan()
    {

        $variabel['csrf'] = csrf();
        $variabel['kawasan'] = $this->m_kawasan->lihatdata();
        if ($this->input->post()) {
            $username = $this->session->userdata("username");
            $array = array(
                'id_kawasan' => $this->input->post('id_kawasan'),
                'kategori' => $this->input->post('kategori'),
                'kegiatan' => $this->input->post('kegiatan'),
                'lintang' => $this->input->post('lintang'),
                'bujur' => $this->input->post('bujur'),
                'petugas' => $this->input->post('petugas'),
                'waktu' => tanggalawal($this->input->post('waktu')),
                'keterangan' => $this->input->post('keterangan'),
                'data1' => $this->input->post('data1'),
                'validasi' => "Menunggu Validasi",
                'username' => $username
            );
            $config['upload_path'] = './assets/images/laporan';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            $this->upload->do_upload("foto");
            $upload = $this->upload->data();
            $file = $upload["raw_name"] . $upload["file_ext"];
            $array['foto'] = $file;
            $exec = $this->m_laporan->tambahdata($array);
            if ($exec) redirect(base_url("app/inputgangguan?msg=1"));
            else redirect(base_url("app/inputgangguan?msg=0"));
        } else {
            $this->layout->render('laporan/v_gangguan', $variabel, 'laporan/v_gangguan_js');
        }
    }

    public function inputsosial()
    {

        $variabel['csrf'] = csrf();
        $variabel['kawasan'] = $this->m_kawasan->lihatdata();
        if ($this->input->post()) {
            $username = $this->session->userdata("username");
            $array = array(
                'id_kawasan' => $this->input->post('id_kawasan'),
                'kategori' => $this->input->post('kategori'),
                'kegiatan' => $this->input->post('kegiatan'),
                'lintang' => $this->input->post('lintang'),
                'bujur' => $this->input->post('bujur'),
                'petugas' => $this->input->post('petugas'),
                'waktu' => tanggalawal($this->input->post('waktu')),
                'keterangan' => $this->input->post('keterangan'),
                'data1' => $this->input->post('data1'),
                'data2' => $this->input->post('data2'),
                'data3' => $this->input->post('data3'),
                'data4' => $this->input->post('data4'),
                'data5' => $this->input->post('data5'),
                'data6' => $this->input->post('data6'),
                'data7' => $this->input->post('data7'),
                'data8' => $this->input->post('data8'),
                'validasi' => "Menunggu Validasi",
                'username' => $username
            );
            $config['upload_path'] = './assets/images/laporan';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            $this->upload->do_upload("foto");
            $upload = $this->upload->data();
            $file = $upload["raw_name"] . $upload["file_ext"];
            $array['foto'] = $file;
            $exec = $this->m_laporan->tambahdata($array);
            if ($exec) redirect(base_url("app/inputsosial?msg=1"));
            else redirect(base_url("app/inputsosial?msg=0"));
        } else {
            $this->layout->render('laporan/v_sosial', $variabel, 'laporan/v_sosial_js');
        }
    }

    public function inputdaya()
    {

        $variabel['csrf'] = csrf();
        $variabel['kawasan'] = $this->m_kawasan->lihatdata();
        if ($this->input->post()) {
            $username = $this->session->userdata("username");
            $array = array(
                'id_kawasan' => $this->input->post('id_kawasan'),
                'kategori' => $this->input->post('kategori'),
                'kegiatan' => $this->input->post('kegiatan'),
                'lintang' => $this->input->post('lintang'),
                'bujur' => $this->input->post('bujur'),
                'petugas' => $this->input->post('petugas'),
                'waktu' => tanggalawal($this->input->post('waktu')),
                'keterangan' => $this->input->post('keterangan'),
                'data1' => $this->input->post('data1'),
                'data2' => $this->input->post('data2'),
                'data3' => $this->input->post('data3'),
                'data4' => $this->input->post('data4'),
                'data5' => $this->input->post('data5'),
                'data6' => $this->input->post('data6'),
                'validasi' => "Menunggu Validasi",
                'username' => $username
            );
            $config['upload_path'] = './assets/images/laporan';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            $this->upload->do_upload("foto");
            $upload = $this->upload->data();
            $file = $upload["raw_name"] . $upload["file_ext"];
            $array['foto'] = $file;
            $exec = $this->m_laporan->tambahdata($array);
            if ($exec) redirect(base_url("app/inputdaya?msg=1"));
            else redirect(base_url("app/inputdaya?msg=0"));
        } else {
            $this->layout->render('laporan/v_daya', $variabel, 'laporan/v_daya_js');
        }
    }

    public function laporanlihat()
    {
        $variabel['csrf'] = csrf();
        $username = $this->session->userdata("username");
        $rule = $this->session->userdata("rule");
        $variabel['kawasan'] = $this->m_kawasan->lihatdata();
        if ($rule == "user") {
            $variabel['rule'] = $rule;
            $variabel['data'] = $this->m_laporan->lihatdatauser($username);
            $this->layout->render('laporanlihat/v_laporanlihatuser', $variabel, 'laporanlihat/v_laporanlihat_js');
        } else {
            if ($this->input->post()) {
                $this->input->post('kategori') == "" ? $kategori = "null" : $kategori = "'" . $this->input->post('kategori') . "'";
                $this->input->post('id_kawasan') == "" ? $id_kawasan = "null" : $id_kawasan = "'" . $this->input->post('id_kawasan') . "'";
                $this->input->post('validasi') == "" ? $validasi = "null" : $validasi = "'" . $this->input->post('validasi') . "'";
                $variabel['jenislaporan'] =  $this->input->post('kategori');
                $variabel['id_kawasan'] =  $this->input->post('id_kawasan');
                $variabel['validasi'] =  $this->input->post('validasi');
                $variabel['exportxls'] = "" . base_url() . "app/exportxls?kategori=" . $kategori . "&id_kawasan=" . $id_kawasan . "&validasi=" . $validasi . "";
            } else {
                $kategori = "null";
                $id_kawasan = "null";
                $validasi = "null";
                $variabel['jenislaporan'] = "";
                $variabel['id_kawasan'] =  "";
                $variabel['validasi'] =  "";
                $variabel['exportxls'] = "" . base_url() . "app/exportxls?kategori=" . $kategori . "&id_kawasan=" . $id_kawasan . "&validasi=" . $validasi . "";
            }

            $variabel['data'] = $this->m_laporan->lihatdatafilter($kategori, $validasi, $id_kawasan);
            // $variabel['data'] = $this->m_laporan->lihatdata2();
            $this->layout->render('laporanlihat/v_laporanlihat', $variabel, 'laporanlihat/v_laporanlihat_js');
        }
    }

    public function exportxls()
    {
        $this->input->get('kategori') ? $kategori  = $this->input->get('kategori') : $kategori  = "null";
        $this->input->get('id_kawasan') ? $id_kawasan  = $this->input->get('id_kawasan') : $id_kawasan  = "null";
        $this->input->get('validasi') ? $validasi  = $this->input->get('validasi') : $validasi  = "null";
        $variabel['data'] = $this->m_laporan->lihatdatafilter($kategori, $validasi, $id_kawasan);
        $variabel['kategori'] = str_replace("'", "", $kategori);
        $variabel['id_kawasan'] = str_replace("'", "", $id_kawasan);
        $variabel['validasi'] = str_replace("'", "", $validasi);
        $this->load->view('laporanlihat/v_laporan_xls', $variabel);
    }

    public function laporandetail()
    {
        $variabel['csrf'] = csrf();

        $polygon = $this->m_pengaturan->lihatdatasatu("1")->row_array();
        $variabel['poligon'] =  $polygon['poligon'];

        $id_laporan = $this->input->get("id");
        $exec = $this->m_laporan->lihatdatasatu($id_laporan);
        if ($exec->num_rows() > 0) {
            $variabel['data'] = $exec->row_array();
            $kategori = $variabel['data']['kategori'];
            $variabel['rule'] = $this->session->userdata("rule");
            if ($kategori == "PAL Batas Wilayah")
                $this->layout->render('laporanlihat/v_paldetail', $variabel, 'laporanlihat/v_detail_js');
            else if ($kategori == "Area Terbuka/Open Area")
                $this->layout->render('laporanlihat/v_areadetail', $variabel, 'laporanlihat/v_detail_js');
            else if ($kategori == "Satwa Liar")
                $this->layout->render('laporanlihat/v_satwadetail', $variabel, 'laporanlihat/v_detail_js');
            else if ($kategori == "Tumbuhan")
                $this->layout->render('laporanlihat/v_tumbuhandetail', $variabel, 'laporanlihat/v_detail_js');
            else if ($kategori == "Wisata Alam")
                $this->layout->render('laporanlihat/v_wisatadetail', $variabel, 'laporanlihat/v_detail_js');
            else if ($kategori == "Gangguan")
                $this->layout->render('laporanlihat/v_gangguandetail', $variabel, 'laporanlihat/v_detail_js');
            else if ($kategori == "Sosial Ekonomi")
                $this->layout->render('laporanlihat/v_sosialdetail', $variabel, 'laporanlihat/v_detail_js');
            else if ($kategori == "Pemberdayaan Masyarakat")
                $this->layout->render('laporanlihat/v_dayadetail', $variabel, 'laporanlihat/v_detail_js');
        } else {
            redirect(base_url("app/laporanlihat"));
        }
    }

    public function cetaklaporan()
    {
        $variabel['csrf'] = csrf();

        $polygon = $this->m_pengaturan->lihatdatasatu("1")->row_array();
        $variabel['poligon'] =  $polygon['poligon'];

        $id_laporan = $this->input->get("id");
        $exec = $this->m_laporan->lihatdatasatu($id_laporan);
        if ($exec->num_rows() > 0) {
            $variabel['data'] = $exec->row_array();
            $kategori = $variabel['data']['kategori'];
            $variabel['rule'] = $this->session->userdata("rule");
            if ($kategori == "PAL Batas Wilayah")
                $this->layout->render('laporanlihat/v_palcetak', $variabel, 'laporanlihat/v_detail_js');
            else if ($kategori == "Area Terbuka/Open Area")
                $this->layout->render('laporanlihat/v_areacetak', $variabel, 'laporanlihat/v_detail_js');
            else if ($kategori == "Satwa Liar")
                $this->layout->render('laporanlihat/v_satwacetak', $variabel, 'laporanlihat/v_detail_js');
            else if ($kategori == "Tumbuhan")
                $this->layout->render('laporanlihat/v_tumbuhancetak', $variabel, 'laporanlihat/v_detail_js');
            else if ($kategori == "Wisata Alam")
                $this->layout->render('laporanlihat/v_wisatacetak', $variabel, 'laporanlihat/v_detail_js');
            else if ($kategori == "Gangguan")
                $this->layout->render('laporanlihat/v_gangguancetak', $variabel, 'laporanlihat/v_detail_js');
            else if ($kategori == "Sosial Ekonomi")
                $this->layout->render('laporanlihat/v_sosialcetak', $variabel, 'laporanlihat/v_detail_js');
            else if ($kategori == "Pemberdayaan Masyarakat")
                $this->layout->render('laporanlihat/v_dayacetak', $variabel, 'laporanlihat/v_detail_js');
        } else {
            redirect(base_url("app/laporanlihat"));
        }
    }

    public function validasi()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->get()) {
            $array = array(
                'validasi' => "Tervalidasi"
            );
            $id_laporan = $this->input->get("id");
            $exec = $this->m_laporan->editdata($id_laporan, $array);
            if ($exec) {
                redirect(base_url("app/laporandetail?id=" . $id_laporan . "&msg=1"));
            }
        } else {
        }
    }

    public function tolak()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->get()) {
            $array = array(
                'validasi' => "Tertolak"
            );
            $id_laporan = $this->input->get("id");
            $exec = $this->m_laporan->editdata($id_laporan, $array);
            if ($exec) {
                redirect(base_url("app/laporandetail?id=" . $id_laporan . "&msg=0"));
            }
        } else {
        }
    }

    public function user()
    {
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_user->lihatdata();
        $this->layout->render('user/v_user', $variabel, 'user/v_user_js');
    }

    public function usertambah()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[app_user.username]');
            $this->form_validation->set_message('is_unique', 'Username sudah ada');
            if ($this->form_validation->run() != false) {
                $array = array(
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'nama' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'nohp' => $this->input->post('nohp'),
                    'jk' => $this->input->post('jk'),
                    'jabatan' => $this->input->post('jabatan'),
                    'rule' => "user"
                );

                $config['upload_path'] = './assets/images/foto';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|gif|GIF';
                $this->load->library('upload', $config);
                $this->upload->do_upload("foto");
                $upload = $this->upload->data();
                $file = $upload["raw_name"] . $upload["file_ext"];
                $array['foto'] = $file;
                $exec = $this->m_user->tambahdata($array);
                if ($exec) redirect(base_url("app/user?msg=1"));
                else redirect(base_url("app/user?msg=0"));
            } else {
                $this->layout->render('user/v_usertambah', $variabel, 'user/v_usertambah_js');
            }
        } else {
            $this->layout->render('user/v_usertambah', $variabel, 'user/v_usertambah_js');
        }
    }


    public function userhapus()
    {
        $username = $this->input->get("id");
        $query2 = $this->m_user->lihatdatasatu($username);
        $row2 = $query2->row();
        $berkas1temp = $row2->foto;
        $path1 = './assets/images/foto/' . $berkas1temp . '';
        if (is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_user->hapus($username);
        redirect(base_url() . "app/user?msg=0");
    }

    public function useredit()
    {

        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $username2 = $this->input->post('username2');
            if ($username != $username2) {
                $is_unique =  '|is_unique[app_user.username]';
            } else {
                $is_unique =  '';
            }
            $this->form_validation->set_rules('username', 'Username', 'required|trim' . $is_unique . '');
            $this->form_validation->set_message('is_unique', 'Username sudah ada');
            if ($this->form_validation->run() != false) {

                $array = array(
                    'nama' => $this->input->post('nama'),
                    'username' => $this->input->post('username'),
                    'jk' => $this->input->post('jk'),
                    'email' => $this->input->post('email'),
                    'nohp' => $this->input->post('nohp'),
                    'jabatan' => $this->input->post('jabatan'),
                );
                $config['upload_path'] = './assets/images/foto';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("foto")) {
                    $upload = $this->upload->data();
                    $foto = $upload["raw_name"] . $upload["file_ext"];
                    $array['foto'] = $foto;

                    $query2 = $this->m_user->lihatdatasatu($username);
                    $row2 = $query2->row();
                    $berkas1temp = $row2->foto;
                    $path1 = './assets/images/foto/' . $berkas1temp . '';
                    if (is_file($path1)) {
                        unlink($path1); //menghapus gambar di folder user
                    }
                } else if ($this->input->post('foto') == "") {
                    $query2 = $this->m_user->lihatdatasatu($username);
                    $row2 = $query2->row();
                    $berkas1temp = $row2->foto;
                    $path1 = './assets/images/foto/' . $berkas1temp . '';
                    if (is_file($path1)) {
                        unlink($path1); //menghapus gambar di folder halaman
                    }
                    $array['foto'] = "";
                }

                $exec = $this->m_user->editdata($username2, $array);
                if ($exec) redirect(base_url("app/useredit?id=" . $username . "&msg=1"));
                else redirect(base_url("app/useredit?id=" . $username . "&msg=0"));
            } else {
                $username = $this->input->get("id");
                $exec = $this->m_user->lihatdatasatu($username);
                $variabel['error'] = 0;
                if ($exec->num_rows() > 0) {
                    $variabel['data'] = $exec->row_array();

                    $this->layout->render('user/v_user_edit', $variabel, 'user/v_user_edit_js');
                } else {
                    redirect(base_url("app/user"));
                }
            }
        } else {
            $username = $this->input->get("id");
            $exec = $this->m_user->lihatdatasatu($username);
            if ($exec->num_rows() > 0) {
                $variabel['data'] = $exec->row_array();
                $this->layout->render('user/v_user_edit', $variabel, 'user/v_user_edit_js');
            } else {
                redirect(base_url("app/user"));
            }
        }
    }

    function gantipassword()
    {
        $username = $this->input->post("username");
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_user->lihatdatasatu($username)->row_array();
        $this->load->view("user/v_password", $variabel);
    }

    public function gantipasswordproses()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'password' => md5($this->input->post('password'))
            );

            $username = $this->input->post("username");
            $exec = $this->m_user->editdata($username, $array);
            if ($exec) {
                redirect(base_url("app/user?msg=3"));
            }
        } else {
        }
    }



    public function laporanedit()
    {

        $variabel['csrf'] = csrf();
        $variabel['kawasan'] = $this->m_kawasan->lihatdata();
        if ($this->input->post()) {
            $username = $this->session->userdata("username");
            $id_laporan = $this->input->post('id_laporan');
            $array = array(
                'id_kawasan' => $this->input->post('id_kawasan'),
                'kategori' => $this->input->post('kategori'),
                'kegiatan' => $this->input->post('kegiatan'),
                'lintang' => $this->input->post('lintang'),
                'bujur' => $this->input->post('bujur'),
                'petugas' => $this->input->post('petugas'),
                'waktu' => tanggalawal($this->input->post('waktu')),
                'keterangan' => $this->input->post('keterangan'),
                'data1' => $this->input->post('data1'),
                'data2' => $this->input->post('data2'),
                'data3' => $this->input->post('data3'),
                'data4' => $this->input->post('data4'),
                'data5' => $this->input->post('data5'),
                'data6' => $this->input->post('data6'),
                'data7' => $this->input->post('data7'),
                'data8' => $this->input->post('data8')
            );
            $config['upload_path'] = './assets/images/laporan';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto")) {
                $upload = $this->upload->data();
                $foto = $upload["raw_name"] . $upload["file_ext"];
                $array['foto'] = $foto;
                $query2 = $this->m_laporan->lihatdatasatu($id_laporan);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/laporan/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1);
                }
            } else if ($this->input->post('foto') == "") {
                $query2 = $this->m_laporan->lihatdatasatu($id_laporan);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/laporan/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1);
                }
                $array['foto'] = "";
            }

            $exec = $this->m_laporan->editdata($id_laporan, $array);
            if ($exec) redirect(base_url("app/laporanedit?id=" . $id_laporan . "&msg=1"));
            else redirect(base_url("app/laporanedit?id=" . $id_laporan . "&msg=0"));
        } else {
            $id_laporan = $this->input->get("id");
            $exec = $this->m_laporan->lihatdatasatu($id_laporan);
            if ($exec->num_rows() > 0) {
                $variabel['data'] = $exec->row_array();
                $kategori = $variabel['data']['kategori'];
                if ($kategori == "PAL Batas Wilayah")
                    $this->layout->render('laporanlihat/v_paledit', $variabel, 'laporanlihat/v_paledit_js');
                else if ($kategori == "Area Terbuka/Open Area")
                    $this->layout->render('laporanlihat/v_areaedit', $variabel, 'laporanlihat/v_areaedit_js');
                else if ($kategori == "Satwa Liar")
                    $this->layout->render('laporanlihat/v_satwaedit', $variabel, 'laporanlihat/v_satwaedit_js');
                else if ($kategori == "Tumbuhan")
                    $this->layout->render('laporanlihat/v_tumbuhanedit', $variabel, 'laporanlihat/v_tumbuhanedit_js');
                else if ($kategori == "Wisata Alam")
                    $this->layout->render('laporanlihat/v_wisataedit', $variabel, 'laporanlihat/v_wisataedit_js');
                else if ($kategori == "Gangguan")
                    $this->layout->render('laporanlihat/v_gangguanedit', $variabel, 'laporanlihat/v_gangguanedit_js');
                else if ($kategori == "Sosial Ekonomi")
                    $this->layout->render('laporanlihat/v_sosialedit', $variabel, 'laporanlihat/v_sosialedit_js');
                else if ($kategori == "Pemberdayaan Masyarakat")
                    $this->layout->render('laporanlihat/v_dayaedit', $variabel, 'laporanlihat/v_dayaedit_js');
            } else {
                redirect(base_url("app/laporanlihat"));
            }
        }
    }

    public function laporanhapus()
    {
        $id_laporan = $this->input->get("id");
        $query2 = $this->m_laporan->lihatdatasatu($id_laporan);
        $row2 = $query2->row();
        $berkas1temp = $row2->foto;
        $path1 = './assets/images/laporan/' . $berkas1temp . '';
        if (is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_laporan->hapus($id_laporan);
        redirect(base_url() . "app/laporanlihat?msg=2");
    }

    public function satwa()
    {
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_satwa->lihatdata();
        $this->layout->render('satwa/v_satwa', $variabel, 'satwa/v_satwa_js');
    }


    public function satwatambah()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'noseri' => $this->input->post('noseri'),
                'pemilik' => $this->input->post('pemilik'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'jenis' => $this->input->post('jenis'),
                'namasatwa' => $this->input->post('namasatwa'),
                'jumlah' => $this->input->post('jumlah'),
                'sejak' => tanggalawal($this->input->post('sejak')),
                'usul' => $this->input->post('usul'),
                'sumber' => $this->input->post('sumber'),
                'genetik' => $this->input->post('genetik'),
                'kesehatan' => $this->input->post('kesehatan'),
                'waktu' => tanggalawal($this->input->post('waktu'))

            );
            $config['upload_path'] = './assets/images/satwa';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DOC';
            $this->load->library('upload', $config);
            $this->upload->do_upload("foto");
            $upload = $this->upload->data();
            $file = $upload["raw_name"] . $upload["file_ext"];
            $array['foto'] = $file;
            $exec = $this->m_satwa->tambahdata($array);
            if ($exec) {
                redirect(base_url("app/satwa?msg=1"));
            } else redirect(base_url("app/satwa?msg=0"));
        } else {
            $this->layout->render('satwa/v_satwatambah', $variabel, 'satwa/v_satwatambah_js');
        }
    }

    public function satwahapus()
    {
        $id_satwa = $this->input->get("id");
        $query2 = $this->m_satwa->lihatdatasatu($id_satwa);
        $row2 = $query2->row();
        $berkas1temp = $row2->foto;
        $path1 = './assets/images/satwa/' . $berkas1temp . '';
        if (is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_satwa->hapus($id_satwa);
        redirect(base_url() . "app/satwa?msg=0");
    }
    public function satwalihat()
    {
        $variabel['csrf'] = csrf();
        $id_satwa = $this->input->get("id");
        $exec = $this->m_satwa->lihatdatasatu($id_satwa);
        if ($exec->num_rows() > 0) {
            $variabel['data'] = $exec->row_array();
            $this->layout->render('satwa/v_satwa_lihat', $variabel);
        } else {
            redirect(base_url("app/satwa"));
        }
    }

    public function satwaedit()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $id_satwa = $this->input->post('id_satwa');

            $array = array(
                'noseri' => $this->input->post('noseri'),
                'pemilik' => $this->input->post('pemilik'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'jenis' => $this->input->post('jenis'),
                'namasatwa' => $this->input->post('namasatwa'),
                'jumlah' => $this->input->post('jumlah'),
                'sejak' => tanggalawal($this->input->post('sejak')),
                'usul' => $this->input->post('usul'),
                'sumber' => $this->input->post('sumber'),
                'genetik' => $this->input->post('genetik'),
                'kesehatan' => $this->input->post('kesehatan'),
                'waktu' => tanggalawal($this->input->post('waktu'))
            );
            $config['upload_path'] = './assets/images/satwa';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto")) {
                $upload = $this->upload->data();
                $foto = $upload["raw_name"] . $upload["file_ext"];
                $array['foto'] = $foto;

                $query2 = $this->m_satwa->lihatdatasatu($id_satwa);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/satwa/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1);
                }
            } else if ($this->input->post('foto') == "") {
                $query2 = $this->m_satwa->lihatdatasatu($id_satwa);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/satwa/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder halaman
                }
                $array['foto'] = "";
            }

            $exec = $this->m_satwa->editdata($id_satwa, $array);
            if ($exec) redirect(base_url("app/satwaedit?id=" . $id_satwa . "&msg=1"));
            else redirect(base_url("app/satwaedit?id=" . $id_satwa . "&msg=0"));
        } else {
            $id_satwa = $this->input->get("id");
            $exec = $this->m_satwa->lihatdatasatu($id_satwa);
            if ($exec->num_rows() > 0) {
                $variabel['data'] = $exec->row_array();
                $this->layout->render('satwa/v_satwa_edit', $variabel, 'satwa/v_satwa_edit_js');
            } else {
                redirect(base_url("app/satwa"));
            }
        }
    }

    public function carikoordinat()
    {
        $variabel['csrf'] = csrf();
        $polygon = $this->m_pengaturan->lihatdatasatu("1")->row_array();
        $variabel['poligon'] =  $polygon['poligon'];

        $this->layout->render('ekstra/v_carikoordinat', $variabel, 'ekstra/v_carikoordinat_js');
    }
    public function profil()
    {

        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $array = array(
                'nama' => $this->input->post('nama'),
                'jk' => $this->input->post('jk'),
                'email' => $this->input->post('email'),
                'nohp' => $this->input->post('nohp'),
                'jabatan' => $this->input->post('jabatan'),
            );
            $config['upload_path'] = './assets/images/foto';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto")) {
                $upload = $this->upload->data();
                $foto = $upload["raw_name"] . $upload["file_ext"];
                $array['foto'] = $foto;

                $query2 = $this->m_user->lihatdatasatu($username);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/foto/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder user
                }
            } else if ($this->input->post('foto') == "") {
                $query2 = $this->m_user->lihatdatasatu($username);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/foto/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder halaman
                }
                $array['foto'] = "";
            }

            $exec = $this->m_user->editdata($username, $array);
            if ($exec) {
                $update =  $this->m_user->lihatdatasatu($username)->row_array();
                $data_session = array(
                    'username' => $update['username'],
                    'statuslogin' => "login",
                    'nama' => $update['nama'],
                    'jabatan' => $update['jabatan'],
                    'foto' => $update['foto'],
                    'rule' => $update['rule'],
                );
                $this->session->set_userdata($data_session);
                redirect(base_url("app/profil?msg=1"));
            } else redirect(base_url("app/profil?msg=0"));
        } else {
            $username = $this->session->userdata("username");
            $exec = $this->m_user->lihatdatasatu($username);
            if ($exec->num_rows() > 0) {
                $variabel['data'] = $exec->row_array();
                $this->layout->render('ekstra/v_profil', $variabel, 'ekstra/v_profil_js');
            } else {
                redirect(base_url("app"));
            }
        }
    }

    public function tentang()
    {
        $this->layout->render('ekstra/v_tentang');
    }

    public function password()
    {

        ceklogin();
        $variabel['csrf'] = csrf();
        $username = $this->session->userdata("username");
        if ($this->input->post()) {
            $exec = $this->m_user->lihatdatasatu($username);
            if ($exec->num_rows() > 0) {
                $data = $exec->row_array();
                if ($data["password"] == md5($this->input->post('passwordlama'))) {
                    $array = array(
                        'password' => md5($this->input->post('password2'))
                    );
                    $exec = $this->m_user->editdata($username, $array);
                    if ($exec) redirect(base_url("app/password?msg=1"));
                    else redirect(base_url("app/password?msg=0"));
                } else {
                    $variabel['gagal'] = "1";
                    $this->layout->render("ekstra/v_password", $variabel, "ekstra/v_password_js");
                }
            } else {
                redirect(base_url("app"));
            }
        } else {
            $exec = $this->m_user->lihatdatasatu($username);
            if ($exec->num_rows() > 0) {
                $variabel['data'] = $this->m_user->lihatdatasatu($username)->row_array();
                $this->layout->render("ekstra/v_password", $variabel, "ekstra/v_password_js");
            } else {
                redirect(base_url("app"));
            }
        }
    }


    public function pengaturan()
    {

        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $id_pengaturan = "1";
            $array = array(
                'jabatan' => $this->input->post('jabatan'),
                'nama' => $this->input->post('nama'),
                'pesan' => $this->input->post('pesan')
            );
            $config['upload_path'] = './assets/images/foto';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto")) {
                $upload = $this->upload->data();
                $foto = $upload["raw_name"] . $upload["file_ext"];
                $array['foto'] = $foto;

                $query2 = $this->m_pengaturan->lihatdatasatu($id_pengaturan);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/foto/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder pengaturan
                }
            } else if ($this->input->post('foto') == "") {
                $query2 = $this->m_pengaturan->lihatdatasatu($id_pengaturan);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/foto/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder halaman
                }
                $array['foto'] = "";
            }

            $exec = $this->m_pengaturan->editdata($id_pengaturan, $array);
            if ($exec) {
                $update =  $this->m_pengaturan->lihatdatasatu($id_pengaturan)->row_array();
                redirect(base_url("app/pengaturan?msg=1"));
            } else redirect(base_url("app/pengaturan?msg=0"));
        } else {
            $id_pengaturan = "1";
            $exec = $this->m_pengaturan->lihatdatasatu($id_pengaturan);
            if ($exec->num_rows() > 0) {
                $variabel['data'] = $exec->row_array();
                $this->layout->render('ekstra/v_pengaturan', $variabel, 'ekstra/v_pengaturan_js');
            } else {
                redirect(base_url("app"));
            }
        }
    }

    public function poligon()
    {

        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'nama' => $this->input->post('nama')

            );
            $id_pengaturan = "1";
            $config['upload_path'] = './assets/images';
            $config['allowed_types'] = 'kml';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("poligon")) {
                $upload = $this->upload->data();
                $poligon = $upload["raw_name"] . $upload["file_ext"];
                $array['poligon'] = $poligon;

                $query2 = $this->m_pengaturan->lihatdatasatu($id_pengaturan);
                $row2 = $query2->row();
                $berkas1temp = $row2->poligon;
                $path1 = './assets/images/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder pengaturan
                }
            } else if ($this->input->post('poligon') == "") {
                $query2 = $this->m_pengaturan->lihatdatasatu($id_pengaturan);
                $row2 = $query2->row();
                $berkas1temp = $row2->poligon;
                $path1 = './assets/images/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder halaman
                }
                $array['poligon'] = "";
            }

            $exec = $this->m_pengaturan->editdata($id_pengaturan, $array);
            if ($exec) {
                $update =  $this->m_pengaturan->lihatdatasatu($id_pengaturan)->row_array();
                redirect(base_url("app/poligon?msg=1"));
            } else redirect(base_url("app/poligon?msg=0"));
        } else {
            $id_pengaturan = "1";
            $exec = $this->m_pengaturan->lihatdatasatu($id_pengaturan);
            if ($exec->num_rows() > 0) {
                $variabel['data'] = $exec->row_array();
                $this->layout->render('ekstra/v_poligon', $variabel, 'ekstra/v_pengaturan_js');
            } else {
                redirect(base_url("app"));
            }
        }
    }

    public function kee()
    {
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_kee->lihatdata();
        $this->layout->render('kee/v_kee', $variabel, 'kee/v_kee_js');
    }


    public function keetambah()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'jenis' => $this->input->post('jenis'),
                'lokasi' => $this->input->post('lokasi'),
                'luas' => $this->input->post('luas'),
                'bentuk' => $this->input->post('bentuk'),
                'sk' => $this->input->post('sk'),
                'nilai' => $this->input->post('nilai'),
                'keterangan' => $this->input->post('keterangan'),
            );
            $config['upload_path'] = './assets/images/kee';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            $this->upload->do_upload("foto");
            $upload = $this->upload->data();
            $file = $upload["raw_name"] . $upload["file_ext"];
            $array['foto'] = $file;

            $config['upload_path'] = './assets/images/kee';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DOC';
            $this->upload->initialize($config);
            $this->upload->do_upload("dokumen");
            $upload = $this->upload->data();
            $file = $upload["raw_name"] . $upload["file_ext"];
            $array['dokumen'] = $file;


            $exec = $this->m_kee->tambahdata($array);
            if ($exec) {
                redirect(base_url("app/kee?msg=1"));
            } else redirect(base_url("app/kee?msg=0"));
        } else {
            $this->layout->render('kee/v_keetambah', $variabel, 'kee/v_keetambah_js');
        }
    }

    public function keehapus()
    {
        $id_kee = $this->input->get("id");
        $query2 = $this->m_kee->lihatdatasatu($id_kee);
        $row2 = $query2->row();
        $berkas1temp = $row2->foto;
        $path1 = './assets/images/kee/' . $berkas1temp . '';
        if (is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_kee->hapus($id_kee);
        redirect(base_url() . "app/kee?msg=0");
    }
    public function keelihat()
    {
        $variabel['csrf'] = csrf();
        $id_kee = $this->input->get("id");
        $exec = $this->m_kee->lihatdatasatu($id_kee);
        if ($exec->num_rows() > 0) {
            $variabel['data'] = $exec->row_array();
            $this->layout->render('kee/v_kee_lihat', $variabel);
        } else {
            redirect(base_url("app/kee"));
        }
    }

    public function keeedit()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $id_kee = $this->input->post('id_kee');

            $array = array(
                'jenis' => $this->input->post('jenis'),
                'lokasi' => $this->input->post('lokasi'),
                'luas' => $this->input->post('luas'),
                'bentuk' => $this->input->post('bentuk'),
                'sk' => $this->input->post('sk'),
                'nilai' => $this->input->post('nilai'),
                'keterangan' => $this->input->post('keterangan'),
            );
            $config['upload_path'] = './assets/images/kee';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto")) {
                $upload = $this->upload->data();
                $foto = $upload["raw_name"] . $upload["file_ext"];
                $array['foto'] = $foto;

                $query2 = $this->m_kee->lihatdatasatu($id_kee);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/kee/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1);
                }
            } else if ($this->input->post('foto') == "") {
                $query2 = $this->m_kee->lihatdatasatu($id_kee);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/kee/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder halaman
                }
                $array['foto'] = "";
            }

            $config['upload_path'] = './assets/images/kee';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DOC';
            $this->upload->initialize($config);
            if ($this->upload->do_upload("dokumen")) {
                $upload = $this->upload->data();
                $dokumen = $upload["raw_name"] . $upload["file_ext"];
                $array['dokumen'] = $dokumen;
                $query2 = $this->m_kee->lihatdatasatu($id_kee);
                $row2 = $query2->row();
                $berkas1temp = $row2->dokumen;
                $path1 = './assets/images/kee/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1);
                }
            }

            $exec = $this->m_kee->editdata($id_kee, $array);
            if ($exec) redirect(base_url("app/keeedit?id=" . $id_kee . "&msg=1"));
            else redirect(base_url("app/keeedit?id=" . $id_kee . "&msg=0"));
        } else {
            $id_kee = $this->input->get("id");
            $exec = $this->m_kee->lihatdatasatu($id_kee);
            if ($exec->num_rows() > 0) {
                $variabel['data'] = $exec->row_array();
                $this->layout->render('kee/v_kee_edit', $variabel, 'kee/v_kee_edit_js');
            } else {
                redirect(base_url("app/kee"));
            }
        }
    }

    public function penangkar()
    {
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_penangkar->lihatdata();
        // var_dump( $variabel['data']);exit;
        $this->layout->render('penangkar/v_penangkar', $variabel);
    }

    public function penangkartambah()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            // var_dump($this->input->post());
            $array = array(
                'nosk' => $this->input->post('nosk'),
                'tglawal_berlaku' => tanggalawal($this->input->post('tglawal_berlaku')),
                'tglakhir_berlaku' => tanggalawal($this->input->post('tglakhir_berlaku')),
                'pemilik' => $this->input->post('pemilik'),
                'alamat' => $this->input->post('alamat'),
                'asal_usul' => $this->input->post('asal_usul')
                // 'reff' => 'penangkar'
            );
            $arrayDetail = json_decode($this->input->post('detail'), true);
            // var_dump($arrayDetail);exit;
            $config['upload_path'] = './assets/images/penangkar';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DOC';
            $this->load->library('upload', $config);
            $this->upload->do_upload("foto");
            $upload = $this->upload->data();
            $file = $upload["raw_name"] . $upload["file_ext"];
            $array['foto'] = $file;
            $exec = $this->m_penangkar->tambahdata($array, $arrayDetail);
            // var_dump($exec);exit;
            if ($exec['status']) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('status' => true)));
            } else {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('status' => false)));
            }
        } else {
            $this->layout->render('penangkar/v_penangkartambah', $variabel);
        }
    }

    public function penangkarhapus()
    {
        $id = $this->input->get("id");
        $query2 = $this->m_penangkar->lihatdatasatu($id);
        $row2 = $query2->row();
        $berkas1temp = $row2->foto;
        $path1 = './assets/images/penangkar/' . $berkas1temp . '';
        if (is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_penangkar->hapus($id);
        redirect(base_url() . "app/penangkar?msg=0");
    }
    public function penangkarlihat()
    {
        $variabel['csrf'] = csrf();
        $id = $this->input->get("id");
        $exec = $this->m_penangkar->lihatdatasatu($id);
        if ($exec->num_rows() > 0) {
            $variabel['data'] = $exec->row_array();
            $this->layout->render('penangkar/v_penangkar_lihat', $variabel);
        } else {
            redirect(base_url("app/penangkar"));
        }
    }
    public function penangkaredit()
    {
        // var_dump($this->input->post());
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $array = array(
                'nosk' => $this->input->post('nosk'),
                'tglawal_berlaku' => tanggalawal($this->input->post('tglawal_berlaku')),
                'tglakhir_berlaku' => tanggalawal($this->input->post('tglakhir_berlaku')),
                'pemilik' => $this->input->post('pemilik'),
                'alamat' => $this->input->post('alamat'),
                'asal_usul' => $this->input->post('asal_usul'),
            );
            $arrayDetail = json_decode($this->input->post('detail'), true);
            $arrayDeleted = json_decode($this->input->post('id_deleted'), true);
            $config['upload_path'] = './assets/images/penangkar';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto")) {
                $upload = $this->upload->data();
                $foto = $upload["raw_name"] . $upload["file_ext"];
                $array['foto'] = $foto;

                $query2 = $this->m_penangkar->lihatdatasatu($id);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/penangkar/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1);
                }
            } else if ($this->input->post('foto') == "") {
                $query2 = $this->m_penangkar->lihatdatasatu($id);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/penangkar/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder halaman
                }
                $array['foto'] = "";
            }

            $exec = $this->m_penangkar->editdata($id, $array, $arrayDetail, $arrayDeleted);
            if ($exec['status']) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('status' => true)));
            } else {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('status' => false)));
            }
        } else {
            $id = $this->input->get("id");
            $exec = $this->m_penangkar->lihatdatasatu($id);
            if ($exec->num_rows() > 0) {
                $variabel['data'] = $exec->row_array();
                $this->layout->render('penangkar/v_penangkar_edit', $variabel);
            } else {
                redirect(base_url("app/penangkar"));
            }
            
        }
    }

    public function pengedar()
    {
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_pengedar->lihatdata();
        // var_dump( $variabel['data']);exit;
        $this->layout->render('pengedar/v_pengedar', $variabel);
    }

    public function pengedartambah()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array = array(
                'nosk' => $this->input->post('nosk'),
                'tentang_sk' => str_replace(array("<em>", "</em>", "<p>", "</p>"), array("<i>", "</i>", "", ""), $this->input->post('tentang_sk')),
                'tglawal_berlaku' => tanggalawal($this->input->post('tglawal_berlaku')),
                'tglakhir_berlaku' => tanggalawal($this->input->post('tglakhir_berlaku')),
                'pemilik' => $this->input->post('pemilik'),
                'alamat' => $this->input->post('alamat'),
                'jenis_komoditi' => str_replace(array("<em>", "</em>", "<p>", "</p>"), array("<i>", "</i>", "", ""), $this->input->post('jenis_komoditi')),
            );
            $config['upload_path'] = './assets/images/pengedar';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DOC';
            $this->load->library('upload', $config);
            $this->upload->do_upload("foto");
            $upload = $this->upload->data();
            $file = $upload["raw_name"] . $upload["file_ext"];
            $array['foto'] = $file;
            $exec = $this->m_pengedar->tambahdata($array);
            if ($exec) {
                redirect(base_url("app/pengedar?msg=1"));
            } else redirect(base_url("app/pengedar?msg=0"));
        } else {
            $this->layout->render('pengedar/v_pengedartambah', $variabel);
        }
    }

    public function pengedarlihat()
    {
        $variabel['csrf'] = csrf();
        $id = $this->input->get("id");
        $exec = $this->m_pengedar->lihatdatasatu($id);
        if ($exec->num_rows() > 0) {
            $variabel['data'] = $exec->row_array();
            $this->layout->render('pengedar/v_pengedar_lihat', $variabel);
        } else {
            redirect(base_url("app/pengedar"));
        }
    }

    public function pengedaredit()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $id = $this->input->post('id');

            $array = array(
                'nosk' => $this->input->post('nosk'),
                'tentang_sk' => str_replace(array("<em>", "</em>", "<p>", "</p>"), array("<i>", "</i>", "", ""), $this->input->post('tentang_sk')),
                'tglawal_berlaku' => tanggalawal($this->input->post('tglawal_berlaku')),
                'tglakhir_berlaku' => tanggalawal($this->input->post('tglakhir_berlaku')),
                'pemilik' => $this->input->post('pemilik'),
                'alamat' => $this->input->post('alamat'),
                'jenis_komoditi' => str_replace(array("<em>", "</em>", "<p>", "</p>"), array("<i>", "</i>", "", ""), $this->input->post('jenis_komoditi'))
            );
            // var_dump($array);
            $config['upload_path'] = './assets/images/pengedar';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto")) {
                $upload = $this->upload->data();
                $foto = $upload["raw_name"] . $upload["file_ext"];
                $array['foto'] = $foto;

                $query2 = $this->m_pengedar->lihatdatasatu($id);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/pengedar/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1);
                }
            } else if ($this->input->post('foto') == "") {
                $query2 = $this->m_pengedar->lihatdatasatu($id);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/pengedar/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder halaman
                }
                $array['foto'] = "";
            }

            $exec = $this->m_pengedar->editdata($id, $array);
            if ($exec) redirect(base_url("app/pengedaredit?id=" . $id . "&msg=1"));
            else redirect(base_url("app/pengedaredit?id=" . $id . "&msg=0"));
        } else {
            $id = $this->input->get("id");
            $exec = $this->m_pengedar->lihatdatasatu($id);
            if ($exec->num_rows() > 0) {
                $variabel['data'] = $exec->row_array();
                $this->layout->render('pengedar/v_pengedar_edit', $variabel);
            } else {
                redirect(base_url("app/pengedar"));
            }
        }
    }
    public function pengedarhapus()
    {
        $id = $this->input->get("id");
        $query2 = $this->m_pengedar->lihatdatasatu($id);
        $row2 = $query2->row();
        $berkas1temp = $row2->foto;
        $path1 = './assets/images/pengedar/' . $berkas1temp . '';
        if (is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_pengedar->hapus($id);
        redirect(base_url() . "app/pengedar?msg=0");
    }

    public function lemkon()
    {
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_lemkon->lihatdata();
        $this->layout->render('lemkon/v_lemkon', $variabel);
    }
    public function lemkontambah()
    {
        $variabel['csrf'] = csrf();

        if ($this->input->post()) {
            $array = array(
                'nosk' => $this->input->post('nosk'),
                'tglawal_berlaku' => tanggalawal($this->input->post('tglawal_berlaku')),
                'tglakhir_berlaku' => tanggalawal($this->input->post('tglakhir_berlaku')),
                'pemilik' => $this->input->post('pemilik'),
                'alamat' => $this->input->post('alamat')
            );
            $arrayDetail = json_decode($this->input->post('detail'), true);
            $config['upload_path'] = './assets/images/lemkon';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DOC';
            $this->load->library('upload', $config);
            $this->upload->do_upload("foto");
            $upload = $this->upload->data();
            $file = $upload["raw_name"] . $upload["file_ext"];
            $array['foto'] = $file;
            $exec = $this->m_lemkon->tambahdata($array, $arrayDetail);
            // exit;
            if ($exec['status']) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('status' => true)));
            } else {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('status' => false)));
            }
        } else {
            $this->layout->render('lemkon/v_lemkontambah', $variabel);
        }
    }

    public function lemkonedit()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            // var_dump('cek123');
            // var_dump($this->input->post());exit;
            $id = $this->input->post('id');
            $array = array(
                'nosk' => $this->input->post('nosk'),
                'tglawal_berlaku' => tanggalawal($this->input->post('tglawal_berlaku')),
                'tglakhir_berlaku' => tanggalawal($this->input->post('tglakhir_berlaku')),
                'pemilik' => $this->input->post('pemilik'),
                'alamat' => $this->input->post('alamat')
            );
            $arrayDetail = json_decode($this->input->post('detail'), true);
            $arrayDeleted = json_decode($this->input->post('id_deleted'), true);
            // var_dump($id,$array,$arrayDetail,$arrayDeleted);exit;
            $config['upload_path'] = './assets/images/lemkon';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto")) {
                $upload = $this->upload->data();
                $foto = $upload["raw_name"] . $upload["file_ext"];
                $array['foto'] = $foto;

                $query2 = $this->m_lemkon->lihatdatasatu($id);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/lemkon/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1);
                }
            } else if ($this->input->post('foto') == "") {
                $query2 = $this->m_lemkon->lihatdatasatu($id);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 = './assets/images/lemkon/' . $berkas1temp . '';
                if (is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder halaman
                }
                $array['foto'] = "";
            }

            $exec = $this->m_lemkon->editdata($id, $array, $arrayDetail, $arrayDeleted);
            if ($exec['status']) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('status' => true)));
            } else {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('status' => false)));
            }

            //     if ($exec) redirect(base_url("app/lemkonedit?id=" . $id . "&msg=1"));
            //     else redirect(base_url("app/lemkonedit?id=" . $id . "&msg=0"));
        } else {
            $id = $this->input->get("id");
            $exec = $this->m_lemkon->lihatdatasatu($id);
            if ($exec->num_rows() > 0) {
                $variabel['data'] = $exec->row_array();
                $this->layout->render('lemkon/v_lemkon_edit', $variabel);
            } else {
                redirect(base_url("app/lemkon"));
            }
        }
    }

    public function lemkonhapus()
    {
        $id = $this->input->get("id");
        $query2 = $this->m_lemkon->lihatdatasatu($id);
        $row2 = $query2->row();
        $berkas1temp = $row2->foto;
        $path1 = './assets/images/lemkon/' . $berkas1temp . '';
        if (is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_lemkon->hapus($id);
        if ($exec['status']) {
            redirect(base_url() . "app/lemkon?msg2=1");
        } else {
            redirect(base_url() . "app/lemkon?msg2=0");
        }
        // var_dump($exec);exit;
        redirect(base_url() . "app/lemkon?msg=0");
    }

    public function lemkonlihat()
    {
        $variabel['csrf'] = csrf();
        $id = $this->input->get("id");
        $exec = $this->m_lemkon->lihatdatasatu($id);
        if ($exec->num_rows() > 0) {
            $variabel['data'] = $exec->row_array();
            $this->layout->render('lemkon/v_lemkon_lihat', $variabel);
        } else {
            redirect(base_url("app/lemkon"));
        }
    }

    public function izinTsl()
    {
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_izinTsl->lihatdata();
        // var_dump( $variabel['data']);exit;
        $this->layout->render('izinTsl/v_izinTsl', $variabel);
    }
    public function izinTsltambah()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            // var_dump($this->input->post());
            $array = array(
                'jenis' => $this->input->post('jenis'),
                'id_reff' => $this->input->post('pemilik'),
                'waktu_pendataan' => tanggalawal($this->input->post('waktu_pendataan')),
                'kelas_satwa' => $this->input->post('kelas_satwa'),
                'jumlah' => $this->input->post('jumlah'),
                'keterangan' => $this->input->post('keterangan')
            );
            // var_dump($array);
            $exec = $this->m_izinTsl->tambahdata($array);
            if ($exec) {
                redirect(base_url("app/izinTsl?msg=1"));
            } else redirect(base_url("app/izinTsl?msg=0"));
        } else {
            $this->layout->render('izinTsl/v_izinTsltambah', $variabel);
        }
    }

    public function izinTsledit()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $array = array(
                'jenis' => $this->input->post('jenis'),
                'id_reff' => $this->input->post('pemilik'),
                'waktu_pendataan' => tanggalawal($this->input->post('waktu_pendataan')),
                'kelas_satwa' => $this->input->post('kelas_satwa'),
                'jumlah' => $this->input->post('jumlah'),
                'keterangan' => $this->input->post('keterangan')
            );
            // var_dump($id);exit;
            $exec = $this->m_izinTsl->editdata($id, $array);

            if ($exec) redirect(base_url("app/izinTsledit?id=" . $id . "&msg=1"));
            else redirect(base_url("app/izinTsledit?id=" . $id . "&msg=0"));
        } else {
            $id = $this->input->get("id");
            $exec = $this->m_izinTsl->lihatdatasatu($id);
            // var_dump($exec);exit;

            if ($exec->num_rows() > 0) {
                $variabel['data'] = $exec->row_array();
                $this->layout->render('izinTsl/v_izinTsl_edit', $variabel);
            } else {
                redirect(base_url("app/izinTsl"));
            }
        }
    }



    public function izinTslhapus()
    {
        $id = $this->input->get("id");
        $exec = $this->m_izinTsl->hapus($id);
        redirect(base_url() . "app/izinTsl?msg=0");
    }

    public function getPemilik()
    {
        $jenis = $this->input->get('jenis');

        if ($jenis == 'penangkar') {
            $result = $this->m_penangkar->getdataPemilik();
        } elseif ($jenis == 'pengedar') {
            $result = $this->m_pengedar->getdataPemilik();
        } else {
            $result = $this->m_lemkon->getdataPemilik();
        }
        $data = $result->result(); // Mengambil hasil query dalam bentuk array

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));

        // $this->output
    }

    public function lihatTsl()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $this->input->post('jenis') == "" ? $jenis = null : $jenis = "" . $this->input->post('jenis') . "";
            $this->input->post('pemilik') == "" ? $id_reff = null : $id_reff = "" . $this->input->post('pemilik') . "";
            $variabel['jenis'] =  $this->input->post('jenis');
            $variabel['id_reff'] =  $this->input->post('pemilik');
            $variabel['exportxls'] = "" . base_url() . "app/exportxlsTsl?jenis=" . $jenis . "&id_reff=" . $id_reff . "";
        } else {
            $jenis = null;
            $id_reff = null;
            $variabel['jenis'] = "";
            $variabel['id_reff'] =  "";
            $variabel['exportxls'] = "" . base_url() . "app/exportxlsTsl?jenis=" . $jenis . "&id_reff=" . $id_reff . "";
        }
        // var_dump($jenis, $id_reff);
        $variabel['data'] = $this->m_izinTsl->lihatdatafilter($jenis, $id_reff);
        // var_dump($variabel['data']);exit;
        $this->layout->render('izinTsl/v_lihatTsl', $variabel);
    }

    public function exportxlsTsl()
    {
        $this->input->get('jenis') ? $jenis  = $this->input->get('jenis') : $jenis  = null;
        $this->input->get('id_reff') ? $id_reff  = $this->input->get('id_reff') : $id_reff  = null;
        $variabel['data'] = $this->m_izinTsl->lihatdatafilterExport($jenis, $id_reff);
        $variabel['jenis'] = str_replace("'", "", $jenis);
        $variabel['id_reff'] = str_replace("'", "", $id_reff);
        $this->load->view('izinTsl/v_laporanTsl', $variabel);
    }
}
