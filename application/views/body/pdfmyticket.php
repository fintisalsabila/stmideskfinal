<!DOCTYPE html>
<html lang="en">
<!--GATAU STYLE NYA GABISA CENTER UDAH NYOBA CODING 5 JAM TETEP STUCK-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>LIST PRGOGRES TIKET</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding: 20px;
        }

        h1 {
            text-align: center;
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
        }

        tr.red-bg {
            background-color: #ffcccc;
        }

        .feedback-btns {
            display: flex;
            justify-content: space-between;
        }

        .feedback-btns a {
            margin-right: 5px;
        }

        .feedback-text {
            font-weight: bold;
        }

        .feedback-positif {
            color: green;
        }

        .feedback-negatif {
            color: red;
        }
    </style>
</head>

<body>
    <div class="row" align="center">
        <h1>LIST TIKET</h1>

        <table class="table table-striped" id="tableorder">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Ticket</th>
                    <th>Tanggal Ticket</th>
                    <th>Nama Kategori</th>
                    <th>Nama Sub Kategori</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                foreach ($datamyticket as $row) : $no++; ?>
                    <tr class="red-bg">
                        <td><?php echo $no; ?></td>
                        <td><a href="<?php echo base_url(); ?>myticket/myticket_detail/<?php echo $row->id_ticket; ?>"><?php echo $row->id_ticket; ?></a></td>
                        <td><?php echo $row->tanggal; ?></td>
                        <td><?php echo $row->nama_kategori; ?></td>
                        <td><?php echo $row->nama_sub_kategori; ?></td>
                    </tr>
                    <tr>
                        <th>Progress</th>
                        <td colspan="4">
                            <?php
                            if ($row->progress == 0) {
                                echo 'Pending';
                            } elseif ($row->progress == 50) {
                                echo 'On Progress';
                            } elseif ($row->progress == 100) {
                                echo 'Done';
                            } else {
                                echo $row->progress;
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td colspan="4">
                            <?php
                            $statusLabels = [
                                1 => "MENUNGGU DISETUJUI KEPALA UNIT",
                                2 => "DISETUJUI KEPALA UNIT",
                                0 => "TICKET DITOLAK",
                                3 => "MENUNGGU APRROVAL KASUBAG",
                                4 => "SEDANG MENENTUKAN TEKNISI",
                                5 => "DIKERJAKAN TEKNISI",
                                6 => "SOLVED",
                            ];
                            echo isset($statusLabels[$row->status]) ? $statusLabels[$row->status] : '';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Feedback</th>
                        <td colspan="4">
                            <?php if ($row->status == 6 && $row->feedback === "") : ?>
                                <div class="feedback-btns">
                                    <a class="ubah btn btn-success btn-xs" href="<?php echo base_url(); ?>myticket/feedback_yes/<?php echo $row->id_ticket; ?>/<?php echo $row->id_teknisi; ?>">Positive</a>
                                    <a title="Hapus Kontak" class="hapus btn btn-danger btn-xs" href="<?php echo base_url(); ?>myticket/feedback_no/<?php echo $row->id_ticket; ?>/<?php echo $row->id_teknisi; ?>">Negative</a>
                                </div>
                            <?php elseif ($row->status == 6) : ?>
                                <p class="feedback-text <?php echo $row->feedback == 1 ? 'feedback-positif' : 'feedback-negatif'; ?>">
                                    <?php echo $row->feedback == 1 ? 'ANDA MEMBERIKAN FEEDBACK POSITIF' : 'ANDA MEMBERIKAN FEEDBACK NEGATIF'; ?>
                                </p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8"></td> <!-- Empty row for spacing -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
