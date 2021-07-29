<div class="gp">
    <h1>Usuarios</h1>
    <div class="tabela">
        <ul>
            <li><strong>ID</strong></li>
            <li><strong>Nome</strong></li>
            <li><strong>CPF</strong></li>
            <li><strong>RG</strong></li>
            <li><strong>Data de nascimento</strong></li>
            <li><strong>Perfil</strong></li>
            <li><strong>Ação</strong></li>

        </ul>
        @foreach($user as $value)
        @php
        $perfil = $value['perfil_id'];
        $array = [1=>'usuario comun', 2=>'Gestor', 3=>'Admin']
        @endphp
        <ul>
            <li>{{$value['id']}}</li>
            <li>{{$value['name']}}</li>
            <li>{{$value['cpf']}}</li>
            <li>{{$value['rg']}}</li>
            <li>{{$value['data_nascimento']}}</li>
            <li>{{$array[$perfil]}}</li>
            <li><a class="list-group-item  ed-usu" id="list-propostas-list" data-toggle="list" href="#ed-usu" dado="{{Crypt::encrypt($value['id'])}}" role="tab" aria-controls="propostas"><i class="icofont-pencil-alt-5"></i></a>|<a href="/home/excluir?dado={{Crypt::encrypt($value['cpf'])}}"><i class="icofont-trash"></i></a></li>
        </ul>
        @endforeach
    </div>

</div>
<div class="gp">
    <h1>Aplicativos</h1>
    <div class="tabela">
        <ul>
            <li><strong>ID</strong></li>
            <li><strong>Nome</strong></li>
            <li><strong>Ação</strong></li>
        </ul>
        @foreach($user as $value)
        @php
        $perfil = $value['perfil_id'];
        $array = [1=>'usuario comun', 2=>'Gestor', 3=>'Admin']
        @endphp
        <ul>
            <li>{{$value['id']}}</li>
            <li>{{$value['name']}}</li>
            <li><a class="list-group-item  ed-usu" id="list-propostas-list" data-toggle="list" href="#ed-usu" dado="{{Crypt::encrypt($value['id'])}}" role="tab" aria-controls="propostas"><i class="icofont-pencil-alt-5"></i></a>|<a href="/home/excluir?dado={{Crypt::encrypt($value['cpf'])}}"><i class="icofont-trash"></i></a></li>
        </ul>
        @endforeach
    </div>
</div>