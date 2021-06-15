<?php
    switch($data[$i][1]){
        case 'RO-000003':
            // pindang kemangi
            $array_detail = array();
            // sambal matang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // pindang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000010',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // kemangi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000037',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            break;
        case 'RO-000030':
            // pindang pete
            $array_detail = array();
            // sambal matang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // pindang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000010',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // pete
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000038',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000031':
            // pindang balado
            $array_detail = array();
            // sambal matang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // pindang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000010',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // jeruk limau
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000079',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000004':
            // lele goreng
            $array_detail = array();
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000001',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal bawang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000013',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000017':
            // lele balado
            $array_detail = array();
            // lele
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000001',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal masak
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // jeruk limau
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000079',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            break;
        case 'RO-000020':
            // lele kemangi
            $array_detail = array();
            // lele
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000001',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal masak
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // kemangi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000037',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000021':
            // lele pete
            $array_detail = array();
            // lele
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000001',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal masak
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // pete
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000038',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
        case 'RO-000005':
            // ayam goreng
            $array_detail = array();
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000002',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal bawang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000013',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000015':
            // ayam balado
            $array_detail = array();
            // ayam
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000002',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal masak
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // jaruk limau
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000079',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000018':
            // ayam kemangi
            $array_detail = array();
            // ayam
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000002',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            
            // sambal matang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // kemangi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000037',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000019':
            // ayam pete
            $array_detail = array();
            // ayam
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000002',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal matang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // pete
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000038',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000022':
            // cumi kemangi
            $array_detail = array();
            // cumi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000011',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // kemangi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000037',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000023':
            // cumi pete
            $array_detail = array();
            // cumi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000011',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // pete
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000038',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000024':
            // cumi hitam
            $array_detail = array();
            // cumi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000011',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // jeruk limau
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000079',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000007':
            // daging balado
            $array_detail = array();
            // daging
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000008',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // jeruk limau
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000079',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000025':
            // daging kemangi
            $array_detail = array();
            // daging
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000008',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // kemangi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000037',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000026':
            // daging pete
            $array_detail = array();
            // daging
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000008',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // pete
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000038',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000016':
            // nasi
            $array_detail = array();
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000029':
            // telur bakso balado
            $array_detail = array();
            // telur bakso
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000039',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal matang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // jeruk limau
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000079',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000028':
            // telur bakso pete
            $array_detail = array();
            // telur bakso
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000039',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal matang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // pete
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000038',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000027':
            // telur bakso kemangi
            $array_detail = array();
            // telur bakso
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000039',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal matang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // kemangi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000037',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000034':
            // teh panas
            $array_detail = array();
            // teh
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000040',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // air
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000047',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // gula
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000042',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000033':
            // es teh
            $array_detail = array();
            // teh
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000040',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // air
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000047',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            // es
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000050',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            // gula
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000042',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000036':
            // jeruk panas
            $array_detail = array();
            // jeruk
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000041',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // air
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000047',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            // gula
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000042',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000035':
            // es jeruk
            $array_detail = array();
            // jeruk
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000041',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            // air
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000047',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            // es
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000050',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            // gula
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000042',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000051':
            $array_detail = array();
            // paket sambal matang kemangi pindang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // pindang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000010',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // kemangi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000037',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000052':
            $array_detail = array();
            // paket sambal matang pete pindang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // pindang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000010',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // pete
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000038',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000053':
            $array_detail = array();
            // paket sambal matang  pindang balado
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // pindang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000010',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            
            // jeruk limau
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000079',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000054':
            $array_detail = array();
            // paket ayam goreng
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000002',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

             // sambal bawang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000013',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000055':
            $array_detail = array();
            // paket sambal matang kemangi ayam
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000002',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal matang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // kemangi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000037',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000056':
            $array_detail = array();
            // paket sambal matang pete ayam
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000002',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            // sambal matang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // pete
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000038',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000057':
            $array_detail = array();
            // paket sambal matang ayam balado
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000002',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal matang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // jeruk limau
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000079',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000058':
            $array_detail = array();
            // paket sambal matang lele goreng
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000001',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal bawang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000013',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000059':
            $array_detail = array();
            // paket sambal matang lele kemangi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000001',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal masak
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // kemangi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000037',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000060':
            $array_detail = array();
            // paket sambal matang lele pete
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000001',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            // sambal masak
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // pete
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000038',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000061':
            $array_detail = array();
            // paket sambal matang lele balado
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000001',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal masak
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // jeruk limau
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000079',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000062':
            $array_detail = array();
            // paket sambal matang kemangi telur
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000039',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal masak
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // kemangi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000037',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000063':
            $array_detail = array();
            // paket sambal matang pete bakso
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000039',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal masak
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // pete
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000038',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
        case 'RO-000064':
            $array_detail = array();
            // paket sambal matang telur balado
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000039',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal masak
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000009',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            
            // jeruk limau
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000079',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000065':
            $array_detail = array();
            // paket sambal matang cumi hitam
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000011',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // jeruk limau
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000079',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000066':
            $array_detail = array();
            // paket sambal matang kemangi cumi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000011',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            
            // kemangi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000037',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000067':
            $array_detail = array();
            // paket sambal matang pete cumi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000011',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            
            // pete
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000038',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000068':
            $array_detail = array();
            // paket sambal matang kemangi daging
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000008',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            
            // kemangi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000037',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000072':
            $array_detail = array();
            // paket sambal matang daging pete
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000008',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            
            // pete
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000038',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000070':
            $array_detail = array();
            // paket sambal matang daging balado
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000008',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            
            // nasi
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000012',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            
            // jeruk limau
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000079',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000073':
                $array_detail = array();
                // oseng udang kemangi
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000045',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));

                // sambal masak
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000009',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));

                // kemangi
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000037',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));
            break;
        case 'RO-000074':
                $array_detail = array();
                // oseng udang pete
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000045',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));

                // sambal masak
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000009',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));

                // pete
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000038',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));
            break;
        case 'RO-000075':
                $array_detail = array();
                // oseng udang balado
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000045',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));

                // sambal masak
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000009',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));

                // jeruk limau
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000079',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));
            break;
        case 'RO-000076':
                $array_detail = array();
                // nasi oseng udang kemangi
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000045',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));

                // sambal masak
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000009',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));

                // kemangi
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000037',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));

                // nasi
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000012',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));
            break;
        case 'RO-000077':
                $array_detail = array();
                // nasi oseng udang pete
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000045',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));

                // sambal masak
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000009',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));

                // pete
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000038',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));

                // nasi
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000012',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));
            break;
        case 'RO-000078':
                $array_detail = array();
                // oseng udang balado
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000045',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));

                // sambal masak
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000009',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));

                // nasi
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000012',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));
                
                // jeruk limau
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000079',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));
            break;
        case 'RO-000032':
                $array_detail = array();
                // dadar jagung
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000044',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));
            break;
        case 'RO-000082':
                $array_detail = array();
                // ayam goreng sambal terasi tomat
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000002',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));

                // sambal terasi tomat
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => 'RO-000080',
                    'stok_out_detail_jumlah' => 1*$data[$i][0]
                ));
            break;
        case 'RO-000083':
            $array_detail = array();
            // ayam goreng sambal plecit
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000002',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal plect
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000081',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        case 'RO-000084':
            $array_detail = array();
            // pindang sambal bawang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000010',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));

            // sambal bawang
            array_push($array_detail, array(
                'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                'stok_out_detail_produk_id' => 'RO-000013',
                'stok_out_detail_jumlah' => 1*$data[$i][0]
            ));
            break;
        default:
            $array_detail = array();
            $id = $data[$i][1];
            $cek_resep = $this->M_bersih->cek_data_resep($id);
            foreach($cek_resep as $row){
                array_push($array_detail, array(
                    'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    'stok_out_detail_produk_id' => $row['resep_produk_bb'],
                    'stok_out_detail_jumlah' => (int)$row['resep_produk_jml'] * $data[$i][0]
                ));
            }
    }
?>