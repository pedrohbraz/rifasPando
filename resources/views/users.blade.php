<table>
<thead>
<tr>
<th>ID</th>
<th>Nome</th>
<th>Email</th>
<th>Telefone</th>
<th>Endereço</th>
<th>Login</th>
<th>Password</th>
<th>Is manager</th>

</tr>
</thead>
<tbody>
@foreach($user as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->nome }}</td>
<td>{{ $user->email_contato }}</td>
<td>{{ $user->telefone}}</td>
<td>{{ $user->endereco}}</td>
<td>{{ $user->login}}</td>
<td>{{ $user->password}}</td>
<td>{{ $user->is_manager}}</td>


<td></td>
</tr>
@endforeach
</tbody>
</table>
<!----------------------------------------------->
