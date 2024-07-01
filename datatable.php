<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DataTable Example</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<style>
    body {
        font-family: Arial, sans-serif;
    }
    .dt-buttons {
        display: none;
    }
</style>
</head>
<body>

<table id="dataTable" class="display">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อ-นามสกุล</th>
            <th>เบอร์โทรศัพท์</th>
            <th>ขนาดเสื้อ</th>
            <th>สถานะเข้าร่วมงาน</th>
            <th>ดำเนินการ</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>นายปกป้อง สิทธิศักดิ์</td>
            <td>0843482116</td>
            <td>XL(อก42,ยาว29)</td>
            <td><button style="background-color:green;color:white;">เข้าร่วมงาน</button></td>
            <td><button>...</button></td>
        </tr>
    </tbody>
</table>
<button id="exportCsv">Export to CSV</button>
<button id="exportExcel">Export to Excel</button>
<button id="exportPdf">Export to PDF</button>
<button id="print">Print</button>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        var dataTable = $('#dataTable').DataTable({
            dom: 'lBfrtip',
            buttons: [
                {
                    extend: 'csvHtml5',
                    text: 'Export to CSV',
                    className: 'exportCsv'
                },
                {
                    extend: 'excelHtml5',
                    text: 'Export to Excel',
                    className: 'exportExcel'
                },
                {
                    extend: 'pdfHtml5',
                    text: 'Export to PDF',
                    className: 'exportPdf'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    className: 'print'
                }
            ],
            lengthMenu: [ [10, 20, 50, -1], [10, 20, 50, "All"] ],
            searching: true,
            paging: true,
            ordering: true,
            language: {
                lengthMenu: "แสดง _MENU_ แถว",
                search: "ค้นหา:",
                paginate: {
                    first: "<<",
                    last: ">>",
                    next: ">",
                    previous: "<"
                },
                info: "กำลังแสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ แถว"
            }
        });

        $('#exportCsv').on('click', function() {
            dataTable.button('.buttons-csv').trigger();
        });

        $('#exportExcel').on('click', function() {
            dataTable.button('.buttons-excel').trigger();
        });

        $('#exportPdf').on('click', function() {
            dataTable.button('.buttons-pdf').trigger();
        });

        $('#print').on('click', function() {
            dataTable.button('.buttons-print').trigger();
        });
    });
</script>

</body>
</html>
