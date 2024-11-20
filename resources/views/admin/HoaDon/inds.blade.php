@extends('admin.layouts.DashboardLayout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2 {
            height: 2px;
            margin: 0 !important;
            page-break-after: always;
        }
        body {
            font-family: Arial;
            font-size: 11px;
            margin:0px;
            padding:0px;
        }
        body#body {
            font-family: Arial,sans-serif;
            margin:0 auto;
        }
        #overlay {
            left:0;
            top:0;
            width:100%;
            height:100%;
            display:none;
            position:fixed;
            background:url(../images/shade1x1.png) repeat;
            z-index:1000;
            opacity:0.7;
            filter: alpha('opacity = 70');
            -moz-opacity:0.7;
        }
        table, th, td, input, textarea, select, radio, checkbox, button {
            font-size: 11px;
            margin:0px auto;
            border-collapse:collapse;
        }
        table.table-print,
        table.table-print>th,
        table.table-print>td {
            border: 1px solid #111;
            border-collapse:collapse;
        }
        table.table-print {
            background: none;
            border-collapse:collapse;
        }

        table.table-print th {
            border-color: #aea4a4;
        }

        table.table-print td {    
            border-color: #aea4a4;
        }
        table.table-print td:last-child {
            border-right: 1px solid;
        }
        .noborder-left {
            border-left: 1px solid #fff !important;
        }
        .noborder-right {
            border-right: 1px solid #fff !important;
        }
        .noborder-top {
            border-top:  1px solid #fff !important;
        }
        .noborder-bottom {
            border-bottom:  1px solid #fff !important;
        }
        .noborder{
            border: 1px solid #fff !important;
        }
        .normal {
            font-weight:normal;
        }
        .left{
            text-align:left;
        }
        .center{
            text-align:center;
        }
        .right{
            text-align:right;
        }
        .justify{
            text-align:justify;
        }
        .yellow {
            color:yellow;
        }
        .red {
            color:red;
        }
        .blue {
            color:blue;
        }
        .green {
            color:green;
        }
        .black {
            color:black;
        }
        .white {
            color:white;
        }
        .underline {
            text-decoration:underline;
        }
        .bold {
            font-weight:bold;
        }
        .italic {
            font-style:italic;
        }
        .uppercase {
            text-transform:uppercase;
        }
        .lowercase {
            text-transform:lowercase;
        }
        .capitalize {
            text-transform:capitalize;
        }
        .onecol,
        .twocol,
        .threecol,
        .fourcol,
        .fivecol,
        .sixcol,
        .sevencol,
        .eightcol,
        .ninecol,
        .tencol,
        .elevencol {
            margin-right: 3.8%;
            float: left;
        }
        .onecol {
            width: 4.85%;
        }
        .twocol {
            width: 13.5%;
        }
        .threecol {
            width: 22.15%;
        }
        .fourcol {
            width: 30.8%;
        }
        .fivecol {
            width: 39.45%;
        }
        .sixcol {
            width: 48.1%;
        }
        .sevencol {
            width: 56.75%;
        }
        .eightcol {
            width: 65.4%;
        }
        .ninecol {
            width: 74.05%;
        }
        .tencol {
            width: 82.7%;
        }
        .elevencol {
            width: 91.35%;
        }
        .twelvecol {
            width: 100%;
            float: left;
        }
        .hoten_ho{
            display:table-row-group;
            float:left;
            width:80%;
            white-space: nowrap;
        }
        .hoten_ten{
            display:table-row-group;
            clear:both;
            float:right;
            width:60px;
            white-space: nowrap;
        }
        hr.c50 {
            border-bottom: none 1px #000;
            text-align: center;
            width: 153px;
            margin: 2px auto;
        }
        hr.c51 {
            border-bottom: none 1px #000;
            text-align: center;
            width: 162px;
            margin: 2px auto;
        }
        .main_title {
            font-size: 125%;
            text-transform: uppercase;
        }
        .sub_title {
            font-size: 110%;
        }
        .table-print-title td {
            padding: 1px;
        }
        table.root_frame td {
            /*padding: 2px 10px;*/
        }
        div#print {
            top:20px;
            right:50px;
            width: 34px;
            height: 34px;
            position:fixed;
            cursor: pointer;
            background: url(../images/iconprint.png) no-repeat center center;
        }
        .doubleline {
            border-left: double 3px #111111;
        }
        .noneline-left{
            border-left: double 1px #111111;
        }
        .noneline-top{
            border-top: double 1px #111111;
        }

        .dotline-top {
            border-top: dotted 1px #111111;
        }
        .dotline-bottom {
            border-bottom: dotted 1px #cccccc;
        }
        .dotline-left {
            border-left: dotted 1px #111111;
        }
        .dotline-right {
            border-right: dotted 1px #111111;
        }
        .yellow {
            color:yellow;
        }
        .red {
            color:red;
        }
        .blue {
            color:blue;
        }
        .green {
            color:green;
        }
        .black {
            color:black;
        }
        .white {
            color:white;
        }
        .chocolate {
            color:chocolate;
        }
        .lightslategray {
            color:lightslategray;
        }
        .orchid {
            color:orchid;
        }
        .yellowgreen {
            color:yellowgreen;
        }
        .bg_yellow {
            background:yellow;
        }
        .bg_red {
            background:red;
        }
        .bg_blue {
            background:blue;
        }
        .bg_green {
            background:green;
        }
        .bg_black {
            background:black;
        }
        .bg_white {
            background:white;
        }
        .bg_chocolate {
            background:chocolate;
        }
        .bg_lightslategray {
            background:lightslategray;
        }
        .bg_orchid {
            background:orchid;
        }
        .bg_yellowgreen {
            background:yellowgreen;
        }
        .bg_gray {
            background:#DCDCDC;
        }
        .underline {
            text-decoration:underline;
        }
        .overline {
            text-decoration:overline;
        }
        table.table-border {
            border: 5px solid #000 !important;
        }
    </style>
</head>
<body>
    
</body>
</html>
<link href="~/Content/print.css" rel="stylesheet" />
<title>Bản in</title>
<table id='tb_main_title' style='border-collapse: collapse;' name='tb_main_title' width='700' class="table-print-title">
    <tr>
        <th align='left' class='bold main_title'>
            CÔNG TY TNHH ABC
        </th>
    </tr>
    <tr>
        <th align='center' class='bold main_title' style='height:35px'>
            DANH SÁCH NHÂN SỰ
        </th>
    </tr>
</table>
<br />
<table id='tb_main_body' style='border-collapse: collapse;' name='tb_main_body' width='700' class="table-print" border="1">
    <tr>
        <th>
            STT
        </th>
        <th>
            Mã NV
        </th>
        <th>
            Họ nhân viên
        </th>
        <th>
            Tên nhân viên
        </th>
        <th align="center">
            Giới tính
        </th>
        <th>
            Ngày sinh
        </th>
        <th>
            Lương
        </th>
        <th>
            Địa chỉ
        </th>
        <th>
            Phòng ban
        </th>
        <th>
            Ghi chú
        </th>

    </tr>
    <tr>
        <td align="center">
            1
        </td>
        <td>
            NV01
        </td>
        <td>
            Võ
        </td>
        <td>
            Hoài Nam
        </td>
        <td align="center">
            Nam
        </td>
        <td>
            04/08/2003
        </td>
        <td>
            1.000.000
        </td>
        <td>
            DK - KH
        </td>
        <td>
            Phòng AB
        </td>
        <td width='10%'>
        </td>
    </tr>
</table>
<!-- @{
    var ngayIn = " ngày " + DateTime.Now.Day.ToString() + " tháng " + DateTime.Now.Month.ToString() + " năm " + DateTime.Now.Year.ToString();
} -->
<table id='tb_footer' name='tb_footer' width='700' border="0" class="fixheader">
    <tr>
        <td align='left' width='30%'></td>
        <td align='center' width='30%'></td>
        <td align='center' class='sign italic'>
            <?php
                $date = date("Y-m-d");
                $date = explode("-",$date);
            ?>
            Khánh Hòa, <?php echo "ngày ".$date[2]." tháng ".$date[1]." năm ".$date[0] ?>
        </td>
    </tr>
    <tr>
        <td align='center' width='30%' class='bold'>Giám đốc</td>
        <td align='center' width='30%' class='bold'>Kế toán</td>
        <td align='center' class='bold'>Người lập danh sách</td>
    </tr>
</table>


@endsection