<!------ Include the above in your HEAD tag ---------->
<!--Author      : @arboshiki-->
<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="utf-8">
            <title>
            </title>
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" id="bootstrap-css" rel="stylesheet">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js">
                </script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
                </script>
            </link>
        </meta>
    </head>
    <style media="screen">
        #invoice{
  padding: 30px;
}

.invoice {
  position: relative;
  background-color: #FFF;
  min-height: 680px;
  padding: 15px
}

.invoice header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #3989c6
}

.invoice .company-details {
  text-align: right
}

.invoice .company-details .name {
  margin-top: 0;
  margin-bottom: 0
}

.invoice .contacts {
  margin-bottom: 20px
}

.invoice .invoice-to {
  text-align: left
}

.invoice .invoice-to .to {
  margin-top: 0;
  margin-bottom: 0
}

.invoice .invoice-details {
  text-align: right
}

.invoice .invoice-details .invoice-id {
  margin-top: 0;
  color: #3989c6
}

.invoice main {
  padding-bottom: 50px
}

.invoice main .thanks {
  margin-top: -40px;
  font-size: 2em;
  margin-bottom: 40px
}
.invoice main .paid {
  margin-top: -50px;
  font-size: 2em;
  margin-bottom: 40px;
  color: red;
}

.invoice main .notices {
  padding-left: 6px;
  border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
  font-size: 1.2em
}

.invoice table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px
}

.invoice table td,.invoice table th {
  padding: 15px;
  background: #eee;
  border-bottom: 1px solid #fff
}

.invoice table th {
  white-space: nowrap;
  font-weight: 400;
  font-size: 16px
}

.invoice table td h3 {
  margin: 0;
  font-weight: 400;
  color: #3989c6;
  font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
  text-align: right;
  font-size: 1.2em
}

.invoice table .no {
  color: #fff;
  font-size: 1.6em;
  background: #3989c6
}

.invoice table .unit {
  background: #ddd
}

.invoice table .total {
  background: #3989c6;
  color: #fff
}

.invoice table tbody tr:last-child td {
  border: none
}

.invoice table tfoot td {
  background: 0 0;
  border-bottom: none;
  white-space: nowrap;
  text-align: right;
  padding: 10px 20px;
  font-size: 1.2em;
  border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
  border-top: none
}

.invoice table tfoot tr:last-child td {
  color: #3989c6;
  font-size: 1.4em;
  border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
  border: none
}

.invoice footer {
  width: 100%;
  text-align: center;
  color: #777;
  border-top: 1px solid #aaa;
  padding: 8px 0
}

@media print {
  .invoice {
      font-size: 11px!important;
      overflow: hidden!important
  }

  .invoice footer {
      position: absolute;
      bottom: 10px;
      page-break-after: always
  }

  .invoice>div:last-child {
      page-break-before: always
  }
}
    </style>
    <body>
        <div class="container">
            <div id="invoice">
                <div class="toolbar hidden-print">
                    <div class="text-right">
                        <button class="btn btn-info" id="printInvoice">
                            <i class="fa fa-print">
                            </i>
                            Print
                        </button>
                        {{--
                        <button class="btn btn-info">
                            <i class="fa fa-file-pdf-o">
                            </i>
                            Export as PDF
                        </button>
                        --}}
                    </div>
                    <hr>
                    </hr>
                </div>
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">
                                <div class="col">
                                    <a href="https://examinationtools.com" target="_blank">
                                        {{--
                                        <img data-holder-rendered="true" src="http://lobianijs.com/lobiadmin/version/1.0/ajax/img/logo/lobiadmin-logo-text-64.png"/>
                                        --}}
                                        <h2>
                                            ExaminationTools
                                        </h2>
                                    </a>
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                                        <a href="https://examinationtools.com" target="_blank">
                                            {{Auth::user()->name}}
                                        </a>
                                    </h2>
                                    {{--
                                    <div>
                                        455 Foggy Heights, AZ 85004, US
                                    </div>
                                    <div>
                                        (123) 456-789
                                    </div>
                                    --}}
                                    <div>
                                        {{Auth::user()->email}}
                                    </div>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <div class="text-gray-light">
                                        INVOICE TO:
                                    </div>
                                    <h2 class="to">
                                        {{$deal->student->name}}
                                    </h2>
                                    <div class="address">
                                        {{$deal->student->details->city}},{{$deal->student->details->country['name']}}
                                    </div>
                                    <div class="email">
                                        <a href="#">
                                            {{$deal->student->email}}
                                        </a>
                                    </div>
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">
                                        INVOICE {{$deal->order->order_track_id}}
                                    </h1>
                                    {{--
                                    <div class="date">
                                        Due Date: 30/10/2018
                                    </div>
                                    --}}
                                </div>
                            </div>
                            <table border="0" cellpadding="0" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            DESCRIPTION
                                        </th>
                                        <th class="text-right">
                                            PRICE
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="no">
                                            01
                                        </td>
                                        <td>
                                            <h3>
                                                <a href="#" target="_blank">
                                                    {{$deal->order->assingment['assingment_name']}}
                                                </a>
                                            </h3>
                                            {{$deal->order->assingment['assingment_details']}}
                                        </td>
                                        <td class="total">
                                            {{$deal->price}} {{ $deal->currency->font_arial }}
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            GRAND TOTAL
                                        </td>
                                        <td>
                                            {{$deal->price}} {{ $deal->currency->font_arial }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <h3>
                                Transection
                            </h3>
                            <table border="0" cellpadding="0" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th class="text-left">
                                            Transection Date
                                        </th>
                                        <th class="text-left">
                                            Transection Id
                                        </th>
                                        <th class="text-right">
                                            PRICE
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="no">
                                            01
                                        </td>
                                        <td class="text-left">
                                            <h3>
                                                <a href="#" target="_blank">
                                                    {{$deal->payment_date}}
                                                </a>
                                            </h3>
                                        </td>
                                        <td class="text-left">
                                            {{$deal->transection_id}}
                                        </td>
                                        <td class="total">
                                            {{$deal->price}} {{ $deal->currency->font_arial }}
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="1">
                                        </td>
                                        <td colspan="2">
                                            GRAND TOTAL
                                        </td>
                                        <td>
                                            {{$deal->price}} {{ $deal->currency->font_arial }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="paid">
                                PAID
                            </div>
                            <div class="thanks">
                                Thank you!
                            </div>
                            <div class="notices">
                                <div>
                                    NOTICE:
                                </div>
                                <div class="notice">
                                    Invoice was created on a computer and is valid without the signature and seal.
                                </div>
                            </div>
                        </main>
                        <footer>
                            Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved
                        </footer>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $('#printInvoice').click(function(){
         Popup($('.invoice')[0].outerHTML);
         function Popup(data)
         {
             window.print();
             return true;
         }
     });
    </script>
</html>
