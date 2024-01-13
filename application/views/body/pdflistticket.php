<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>REPORT LIST TICKETING</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Status Colors */
        .status-2 { color: blue; }
        .status-3 { color: orange; }
        .status-4 { color: purple; }
        .status-5 { color: brown; }
        .status-6 { color: green; }

        /* Responsive Styles */
        @media print {
            body {
                padding: 10px;
            }

            table {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <div class="row" align="center">
        <h1>REPORT LIST TICKETING</h1>

        <table class="table table-striped" id="tableorder">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Ticket</th>
                    <th>Reported</th>
                    <th>Dept</th>
                    <th>Tanggal</th>
                    <th>Nama Kategori</th>
                    <th>Nama Sub Kategori</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0; foreach($datalist_ticket as $row) : $no++;?>
                    <tr class="red-bg">
                        <td><?php echo $no; ?></td>
                        <td>
                            <?php if($row->status==2) {?>
                                <a href="<?php echo base_url();?>list_ticket/pilih_teknisi/<?php echo $row->id_ticket;?>"><?php echo $row->id_ticket;?></a>
                            <?php } else {?>
                                <a href="<?php echo base_url();?>list_ticket/view_progress_teknisi/<?php echo $row->id_ticket;?>"><?php echo $row->id_ticket;?></a>
                            <?php }?>
                        </td>
                        <td><?php echo $row->nama;?></td>
                        <td><?php echo $row->nama_dept;?></td>
                        <td><?php echo $row->tanggal;?></td>
                        <td><?php echo $row->nama_kategori;?></td>
                        <td><?php echo $row->nama_sub_kategori;?></td>
                        <td class="status-<?php echo $row->status; ?>">
                            <?php 
                            if($row->status==2) { echo "APPROVAL INTERNAL";}
                            else if($row->status==3) { echo "MENUNGGU APPROVAL TEKNISI";}
                            else if($row->status==4) { echo "PROSES TEKNISI";}
                            else if($row->status==5) { echo "PENDING TEKNISI";}
                            else if($row->status==6) { echo "SOLVED";}
                            ?>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>

</html>
