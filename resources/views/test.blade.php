@extends('layouts.main')

@section('body')
    @include('layouts.cardOpen')
        @if(isset($errorMessage))
            <div class="alert-danger mt-1 p-2">{{ $errorMessage }}</div>
        @endif
        
        <div class="row mt-2">
          <div class="col-6"> 
            <div class="col">              
              <h5 class="card-title">Permintaan Barang</h5>
            </div>
            <div class="col">
              <p>Permintaan : 0</p>
            </div>
          </div>
          <div class="col-6 d-flex justify-content-end h-50">
            <button class="btn btn-primary">Tambahkan Data</button>
          </div>
        </div>

        <div style="max-height: 100vh; overflow-y:auto;">
            <div class="card-text me-3">    
                  <div style="max-height: 68vh; overflow-y:auto;">
                    <div class="card-text me-3">
                      
                      <table id="myTable">
                        <thead class="thead">
                            <tr>
                                <th>Column 1</th>
                                <th>Column 2</th>
                                <th>Column 3</th>
                                <th>Column 4</th>
                                <th>Column 5</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php for($a =0; $a<50; $a++){?>
                            <tr>
                                <td>Row 1 Data 1</td>
                                <td>Row 1 Data 2</td>
                                <td>Row 1 Data 3</td>
                                <td>Row 1 Data 4</td>
                                <td>Row 1 Data 5</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                      </table>
                      
                    </div>
                  </div>
            </div>
        </div>
        
    @include('layouts.cardClose')
@endsection


@section('script')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
              
            });
        }); 
    </script>
@endsection