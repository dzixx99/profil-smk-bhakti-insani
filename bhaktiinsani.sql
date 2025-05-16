-- Active: 1717249058939@@127.0.0.1@3306@bhaktiinsani
create DATABASE bhaktiinsani;

use bhaktiinsani;

create table guru(kd_guru VARCHAR(03)  primary key,
    NIP int ,
    nama_guru varchar(255) ,
    gr_tmp_lahir varchar(255) ,
    gr_tgl_lahir date ,
    jenkel VARCHAR(15) ,
    pendidikan varchar(255),
    gr_alamat varchar(255) ,
    gr_foto mediumlob );

INSERT INTO `guru` (`kd_guru`,`nip`, `nama_guru`, `gr_tmp_lahir`, `gr_tgl_lahir`, `jenkel`, `pendidikan`, `gr_alamat`, `gr_foto`) VALUES
('01','', 'Drs. Budiyono, M.Si.', '', NULL, 'Laki-laki', 'S-2', '', ''),
('02','', 'Asep Suryadi, M.Pd.', '', NULL, 'Laki-laki', 'S-2',  '', ''),
('03','', 'Bowo Dwi Darmawan, S.Pd.', '', NULL, 'Laki-laki', 'S-1',  '', ''),
('04','', 'Sri Apriyanti h., S.Kom.', '', NULL, 'Perempuan', 'S-1',  '', ''),
('05','', 'Dany Benuardi, S.Pd', '', NULL, 'Laki-laki', 'S-1',  '', ''),
('06','', 'Suseno Khaidir, S.Kom.', '', NULL, 'Laki-laki', 'S-1',  '', ''),
('07','', 'Rian Anugrah, S.Kom.', '', NULL, 'Laki-laki', 'S-1',  '', ''),
('08','', 'Wahyu Kusuma Ningrum, SE.MM.', '', NULL, 'Perempuan', 'S-2',  '', ''),
('09','', 'Latifah, S.Sos.', '', NULL, 'Perempuan', 'S-1',  '', ''),
('10','', 'Dinda Farila, S.Ds.', '', NULL, 'Perempuan', 'S-1',  '', ''),
('11','', 'Yuliansyah Sadikin, S.Sosl', '', NULL, 'Laki-laki', 'S-1',  '', ''),
('12','', 'Putri Naviska Awaliyah, S.Pd.', '', NULL, 'Perempuan', 'S-1', '', ''),
('13','', 'Eros Rohati, S.Pd.', '', NULL, 'Perempuan', 'S-1',  '', ''),
('14','', 'Tiar Rizaldi, S.Pd.', '', NULL, 'Laki-laki', 'S-1',  '', ''),
('15','', 'Januar Rachmat Setia Aji, S.Pd.', '', NULL, 'Laki-laki', 'S-1',  '', ''),
('16','', 'Rini Prastiwyati, S.Pd.', '', NULL, 'Perempuan', 'S-1',  '', ''),
('17','', 'Mochamad Ridwan, S.Kom', '', NULL, 'Laki-laki', 'S-1',  '', ''),
('18','', 'Pandu Rachmawan, S.kom.', '', NULL, 'Laki-laki', 'S-1',  '', ''),
('19','', 'Aldiansyah', '', NULL, 'Laki-laki', 'SMK',  '', ''),
('20','', 'Kustiyana, S.PD.l.', '', NULL, 'Laki-laki', 'S-1',  '', ''),
('21','', 'Sri Yuliana, S.Pd.', '', NULL, 'Perempuan', 'S-1', '', ''),
('22','', 'Angga Surya', '', NULL, 'Laki-laki', 'SMK', '', ''),
('23','', 'Raden Susan Hoerunnisa, S.Pd.', '', NULL, 'Perempuan', 'S-1',  '', ''),
('24','', 'Irma Rizki, S.S.', '', NULL, 'Perempuan', 'S-1',  '', ''),
('25','', 'Nur Hidayah, SE.', '', NULL, 'Perempuan', 'S-1',  '', ''),
('26','', 'Yuli Listiani, S.Pd.', '', NULL, 'Perempuan', 'S-1',  '', ''),
('27','', 'Detty Yuniarti, S.Pd.', '', NULL, 'Perempuan', 'S-1',  '', ''),
('28','', 'Gunawan, S.Kom.', '', NULL, 'Laki-laki', 'S-1',  '', ''),
('29','', 'Dra. Lena Herlimawaty', '', NULL, 'Perempuan', 'S-1',  '', ''),
('30','', 'Yosina Hitus, S.Th.', '', NULL, 'Perempuan', 'S-1',  '', ''),
('31','', 'Murnu Hariyani, S.Pd.', '', NULL, 'Perempuan', 'S-1',  '', ''),
('32','', 'Annisa Tayari Zahra, S.Pd.', '', NULL, 'Perempuan', 'S-1',  '', ''),
('33','', 'Suci Sundari, S.Pd.', '', NULL, 'Perempuan', 'S-1',  '', ''),
('34','', 'Kusmiati Umar Syarif, Phd.', '', NULL, 'Perempuan', 'S-1',  '', ''),
('35','', 'Sarah Setiawati, M.Si.', '', NULL, 'Perempuan', 'S-2', '', ''),
('36','', 'Rivaldi', '', NULL, 'Laki-laki', 'SMK','', '');


CREATE Table jadwal(kd_jadwal int  primary key AUTO_INCREMENT,  
    hari char(1) ,
    jam VARCHAR(03),   
    mapel VARCHAR(255) ,
    kd_kelas int ,
    kd_guru VARCHAR(03) ,
    FOREIGN KEY (kd_guru) REFERENCES guru(kd_guru),
    FOREIGN KEY (kd_kelas) REFERENCES kelas(kd_kelas));      

CREATE TABLE kelas (
    kd_kelas INT PRIMARY KEY AUTO_INCREMENT,
    kelas VARCHAR(20),
    jurusan VARCHAR(20),
    siswa INT,
    siswi INT,
    wali_kelas VARCHAR(50)
);

CREATE Table admin(kd_admin int  primary key,
    username VARCHAR(255) ,
    password VARCHAR(255) );

CREATE TABLE berita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    gambar LONGBLOB NOT NULL,  
    tanggal DATETIME NOT NULL,
    kategori VARCHAR(50) NOT NULL
);

CREATE Table user(kd_user int  primary key,
    username VARCHAR(255) ,
    email VARCHAR(255) ,
    alamat_email VARCHAR(255) );

CREATE Table siswa(kd_siswa VARCHAR(03)  PRIMARY KEY,
    NIS INT ,
    nama_siswa VARCHAR(255) ,
    sw_tmp_lahir VARCHAR(255) ,
    sw_tgl_lahir DATE ,
    jenkel VARCHAR(20) ,
    sw_alamat VARCHAR(255) ,
    sw_foto VARCHAR(255) );

CREATE Table pesan(kd_pesan int  primary key,
    judul VARCHAR(255) ,
    pesan VARCHAR(255) ,
    kd_user int ,
    kd_admin int,
    FOREIGN KEY (kd_admin) REFERENCES admin(kd_admin),
    FOREIGN KEY (kd_user) REFERENCES user(kd_user));

