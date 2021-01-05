<style>
    td {
        padding: 0 !important;
        border: 1px solid #dee2e6 !important;
    }
    table{
        border-collapse: collapse;
        text-align: center;
    }
</style>
<div class="table-responsive">
    <table class="table products-table">

        <thead class=" text-primary">
            <tr>
                <th class="serial">@lang('eng.SERIAL')</th>
                <th class="user">@lang('eng.NAME')</th>
                <th class="product">@lang('eng.PRODUCTS')</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sl = 1;
            if (!empty($userList)) {
                foreach ($userList as $user) {
                    ?>
                    <tr>
                        <td class="serial">{{$sl++}}</td>
                        <td class="user"> {{$user->name}} </td>
                        <td class=" product"> 
                           
                                <?php
                                if (!empty($prosuctList)) {
                                    foreach ($prosuctList as $product) {
                                        if ($user->id == $product->user_id) {
                                              echo  $product->product_name ;?><br/>
                                       <?php } 
                                    }
                                }
                                ?>
                        </td>
                    </tr>
                <?php }
            }
            ?>
        </tbody>
    </table>
</div>

    <script src="{{asset('public/assets/js/core/jquery.min.js')}}"></script>

    <script type='text/javascript'>
window.print();
    </script>

