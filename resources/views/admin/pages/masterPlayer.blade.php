@extends('admin.master')

@section('judul','Master Player')
@section('deskripsi','Table data Player')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box ">
    <div class="box-header">
      <div class="column">
        <div class="col-md-10">
            <section class="content-header" style="padding : 0;">
                <h1>
                    Master Player
                  <small>Table data Player</small>
                </h1>
              </section>
          {{-- <h1 class="box-title">Hover Data Table</h1> --}}
        </div>
        <div class="col-md-2"><button  type="button" class="btn btn-block btn-danger">Tabmbah Data</button></div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="master-player" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>CSS grade</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 4.0
          </td>
          <td>Win 95+</td>
          <td> 4</td>
          <td>X</td>
        </tr>
        <tr>
            <td>Gecko</td>
            <td>Netscape Browser 8</td>
            <td>Win 98SE+</td>
            <td>1.7</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Gecko</td>
            <td>Netscape Navigator 9</td>
            <td>Win 98+ / OSX.2+</td>
            <td>1.8</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Gecko</td>
            <td>Mozilla 1.0</td>
            <td>Win 95+ / OSX.1+</td>
            <td>1</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Gecko</td>
            <td>Mozilla 1.1</td>
            <td>Win 95+ / OSX.1+</td>
            <td>1.1</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Gecko</td>
            <td>Mozilla 1.2</td>
            <td>Win 95+ / OSX.1+</td>
            <td>1.2</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Gecko</td>
            <td>Mozilla 1.3</td>
            <td>Win 95+ / OSX.1+</td>
            <td>1.3</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Gecko</td>
            <td>Mozilla 1.4</td>
            <td>Win 95+ / OSX.1+</td>
            <td>1.4</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Gecko</td>
            <td>Mozilla 1.5</td>
            <td>Win 95+ / OSX.1+</td>
            <td>1.5</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Gecko</td>
            <td>Mozilla 1.6</td>
            <td>Win 95+ / OSX.1+</td>
            <td>1.6</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Gecko</td>
            <td>Mozilla 1.7</td>
            <td>Win 98+ / OSX.1+</td>
            <td>1.7</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Gecko</td>
            <td>Mozilla 1.8</td>
            <td>Win 98+ / OSX.1+</td>
            <td>1.8</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Gecko</td>
            <td>Seamonkey 1.1</td>
            <td>Win 98+ / OSX.2+</td>
            <td>1.8</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Gecko</td>
            <td>Epiphany 2.20</td>
            <td>Gnome</td>
            <td>1.8</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Webkit</td>
            <td>Safari 1.2</td>
            <td>OSX.3</td>
            <td>125.5</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Webkit</td>
            <td>Safari 1.3</td>
            <td>OSX.3</td>
            <td>312.8</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Webkit</td>
            <td>Safari 2.0</td>
            <td>OSX.4+</td>
            <td>419.3</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Webkit</td>
            <td>Safari 3.0</td>
            <td>OSX.4+</td>
            <td>522.1</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Webkit</td>
            <td>OmniWeb 5.5</td>
            <td>OSX.4+</td>
            <td>420</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Webkit</td>
            <td>iPod Touch / iPhone</td>
            <td>iPod</td>
            <td>420.1</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Webkit</td>
            <td>S60</td>
            <td>S60</td>
            <td>413</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Presto</td>
            <td>Opera 7.0</td>
            <td>Win 95+ / OSX.1+</td>
            <td>-</td>
            <td>A</td>
          </tr>
          <tr>
            <td>Presto</td>
            <td>Opera 7.5</td>
            <td>Win 95+ / OSX.2+</td>
            <td>-</td>
            <td>A</td>
          </tr>
        <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 5.0
          </td>
          <td>Win 95+</td>
          <td>5</td>
          <td>C</td>
        </tr>
        
        <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 5.5
          </td>
          <td>Win 95+</td>
          <td>5.5</td>
          <td>A</td>
        </tr>
        <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 6
          </td>
          <td>Win 98+</td>
          <td>6</td>
          <td>A</td>
        </tr>
        <tr>
          <td>Trident</td>
          <td>Internet Explorer 7</td>
          <td>Win XP SP2+</td>
          <td>7</td>
          <td>A</td>
        </tr>
        <tr>
          <td>Trident</td>
          <td>AOL browser (AOL desktop)</td>
          <td>Win XP</td>
          <td>6</td>
          <td>A</td>
        </tr>
    </tbody>
  </table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
</div>
@endsection

@section('js')
<script>
    $(function () {
      $('#master-player').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      })
    })
  </script>
@endsection