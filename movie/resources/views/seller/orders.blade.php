@extends('seller.base')
    @section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>订单管理</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>订单号</th>
                    <th>用户</th>
                    <th>订单金额</th>
                    <th>支付状态</th>
                    <th>下单时间</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                         Explorer 4.0</td>
                    <td>Win 95+</td>
                    <td>4</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                         Explorer 5.0</td>
                    <td>Win 95+</td>
                    <td>5</td>
                    <td>C</td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                         Explorer 5.5</td>
                    <td>Win 95+</td>
                    <td>5.5</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                         Explorer 6</td>
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
                <tr>
                    <td>Gecko</td>
                    <td>Firefox 1.0</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td>1.7</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Firefox 1.5</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td>1.8</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Firefox 2.0</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td>1.8</td>
                    <td>A</td>
                </tr>



            </tbody>
        </table>
    </div>
</div>
    @endsection