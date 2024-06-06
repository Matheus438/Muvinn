<?php

namespace App\Http\Controllers;

use App\Http\Requests\MuvinnFormRequest;
use App\Http\Requests\MuvinnUpdateFormRequest;
use App\Models\Muvinn;
use Illuminate\Http\Request;

class MuvinnController extends Controller
{
    public function criarAnuncio(MuvinnFormRequest $request)
    {
        $muvinn = Muvinn::create([
            'estado' => $request->estado,
            'cidade' => $request->cidade,
            'endereco' => $request->endereco,
            'tipos_imoveis' => $request->tipos_imoveis,
            'preco' => $request->preco,
            'banheiros' => $request->banheiros,
            'quartos'=> $request->quartos,
            'vagas'=> $request->vagas,
            'area_do_imovel'=> $request-> area_do_imovel,
        ]);
        return response()->json([
            "success" => true,
            "message" => "Imóvel cadastrado com êxito!",
            "data" => $muvinn
        ], 200);
        if (count($muvinn) > 0) {
            return response()->json([
                "status" => false,
                "message" => "Impossivel realizar o cadastro do imóvel!"
            ]);
        }
    }
    public function pesquisaPorEndereco(Request $request)
    {
        $muvinn = Muvinn::where('endereco', 'like', '%' . $request->endereco . '%')->get();

        if (count($muvinn) > 0) {

            return response()->json([
                'status' => true,
                'data' => $muvinn
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Não há resultado para pesquisa.'
        ]);
    }

    public function pesquisaPorId(Request $request)
    {
        $muvinn = Muvinn::where('id', 'like', '%' . $request->id . '%')->get();

        if (count($muvinn) > 0) {

            return response()->json([
                'status' => true,
                'data' => $muvinn
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Não há resultado para pesquisa.'
        ]);
    }

    public function excluir($id)
    {
        $muvinn = Muvinn::find($id);
        if (!isset($muvinn)) {
            return response()->json([
                'status' => false,
                'message' => "Nenhum imovel encontrado"
            ]);
        }

        $muvinn->delete();
        return response()->json([
            'status' => true,
            'message' => "Imovel deletado com sucesso"
        ]);
    }
    public function update(MuvinnUpdateFormRequest $request)
    {
        $muvinn = Muvinn::find($request->id);

        if (!isset($muvinn)) {
            return response()->json([
                'status' => false,
                'message' => "Imovel não encontrado"
            ]);
        }
        
        if(isset($request->estado)){
        $muvinn-> estado = $request->estado;
        }
        if(isset($request->cidade)){
        $muvinn-> cidade = $request->cidade;
        }
        if(isset($request->endereco)){
        $muvinn-> endereco = $request->endereco;
        }
        if(isset($request->tipos_imoveis)){
        $muvinn-> tipos_imoveis = $request->tipos_imoveis;
        }
         if(isset($request->preco)){
        $muvinn-> preco = $request->preco;
        }
        if(isset($request->banheiros)){
            $muvinn-> banheiros = $request->banheiros;
        }
        if(isset($request->quartos)){
            $muvinn-> quartos = $request->quartos;
        }
        if(isset($request->vagas)){
            $muvinn-> vagas = $request->vagas;
        }
        if(isset($request->area_do_imovel)){
            $muvinn-> area_do_imovel = $request->area_do_imovel;
        }

        $muvinn->update();

        return response()->json([
            'status' => true,
            'message' => "Anuncio de imovel atualizado."
        ]);
        
    }
    public function retornarTodos(){
        $muvinn = Muvinn::all();

        if(count($muvinn)==0){
            return response()->json([
                'status'=> false,
                'message'=> "Nenhim imovel encontrado."
            ]);
        }
        return response()->json([
            'status'=> true,
            'data' => $muvinn
        ]);
       }
    
}
