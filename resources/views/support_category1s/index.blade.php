@extends('layouts.app')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">支援種別(大)</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <!-- MAIN CONTENT -->
    <section class="content">
    <div class="container-fluid">

      {{-- エラーメッセージ --}}
      @if(session('message'))
        <div class="alert alert-danger">
          {{ session('message') }}
        </div>
      @endif
      @if (session()->has('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif


      <div class="row">


        <section class="col-lg-12 connectedSortable">

          <div class="card card-info">

            <div class="card-header">
              <h3 class="card-title">一覧</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">

              <a href="{{ route('support_category1s.create') }}" class="btn btn-primary pull-right"><i class="fas fa-plus"></i>  新規作成</a>
              <br><br>

              @if(filled($support_category1s))
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th style="width: 15em">名称</th>
                  <th>支援種別(中)</th>
                  <th style="width: 200px">操作</th>
                </tr>
                </thead>
                <tbody>

                @foreach($support_category1s as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>

                    @if (filled($user->supportCategory2s))

                      @foreach($user->supportCategory2s as $support_category2)
                        <span class="badge badge-info">{{ $support_category2->name }}</span>
                      @endforeach

                      <br>
                    @endif


                    <a class="btn btn-default" href="{{ route('support_category2s.index', ['support_category1_id' => $user->id]) }}"><i class="fas fa-wrench"></i> 支援種別(中)管理</a>

                  </td>
                  <td>
{{--                    @can('update', $user)--}}
                      <a href="{{ route('support_category1s.edit', ['support_category1' => $user->id]) }}" class="btn btn-default"><i class="fas fa-edit"></i> 編集</a>
{{--                    @endcan--}}

{{--                    @can('delete', $user)--}}
                      {!! Form::open(['route' => ['support_category1s.destroy', $user->id], 'style' => 'display:inline']) !!}
                      @method('DELETE')
                      <button class="btn btn-danger" onclick="if ( ! confirm('削除します。よろしいですか？')){return false;}"><i class="fas fa-trash"></i> 削除</button>
                      {!! Form::close() !!}
{{--                    @endcan--}}
                  </td>
                </tr>
                @endforeach


                </tbody>
              </table>

                <br>
                {{ $support_category1s->links('vendor.pagination.bootstrap-4') }}


              @else
                <div class="alert alert-dark">
                  <div class="pT-1 pB-1">
                    <strong>登録がないか、条件に一致するデータがありません。</strong>

                  </div>
                </div>
              @endif

            </div>
            <!-- /.card-body -->

          </div>
        </section>
      </div>

    </div>
    <!-- END CONTAINER FLUID -->
  </div>
  <!-- END MAIN CONTENT -->

  </section>
@endsection
