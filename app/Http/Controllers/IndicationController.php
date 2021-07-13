<?php

namespace App\Http\Controllers;

use App\Http\Requests\Indication\CreateRequest;
use App\Models\Indication;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class IndicationController extends Controller
{
    protected $indicationRepository;

    /**
     * Método construtor com injeção de dependência.
     *
     * @param Indication $indicationRepository
     */
    public function __construct(Indication $indicationRepository)
    {
        $this->indicationRepository = $indicationRepository;
    }

    /**
     * Listar registro
     *
     * @return Application
     */
    public function index()
    {
        $indications = $this->indicationRepository->orderBy('name', 'ASC')->paginate();

        $data = [];

        foreach ($indications as $indication) {
            $data[] = [
                'id' => $indication->id,
                'name' => $indication->name,
                'phone' => $indication->phone,
                'email' => $indication->email,
                'cpf' => $indication->cpf,
                'status_id' => $indication->status_id,
                'status' => $indication->status->description,
            ];
        }

        return response($data);
    }

    /**
     * Atualizar Status
     *
     * @return Application
     */
    public function updateStatus(Indication $indication)
    {
        if ($indication->status->next === null) {
            return response('Não é possivel ser atualizado', 204);
        }

        $indication->update([
           'status_id' => $indication->status->next,
        ]);

        return response('Atualizado com sucesso', 200);
    }

    /**
     * Salvar registro
     *
     * @param CreateRequest $request
     * @return Application|Response|ResponseFactory
     */
    public function store(CreateRequest $request)
    {
        $indication = $this->indicationRepository->create($request->all());

        return response('Atualizado com sucesso', 200);
    }

    /**
     * Apagar registro
     *
     * @param Indication $indication
     * @return RedirectResponse
     */
    public function destroy(Indication $indication): RedirectResponse
    {
        try {
            $indication->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('messages.error.unavailable'));
        }

        return redirect()->route('indication.index')->with('message', __('messages.success.removed'));
    }

}
