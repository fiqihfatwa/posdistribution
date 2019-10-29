<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLicenseAPIRequest;
use App\Http\Requests\API\UpdateLicenseAPIRequest;
use App\Models\License;
use App\Repositories\LicenseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LicenseController
 * @package App\Http\Controllers\API
 */

class LicenseAPIController extends AppBaseController
{
    /** @var  LicenseRepository */
    private $licenseRepository;

    public function __construct(LicenseRepository $licenseRepo)
    {
        $this->licenseRepository = $licenseRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/licenses",
     *      summary="Get a listing of the Licenses.",
     *      tags={"License"},
     *      description="Get all Licenses",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/License")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $licenses = $this->licenseRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($licenses->toArray(), 'Licenses retrieved successfully');
    }

    /**
     * @param CreateLicenseAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/licenses",
     *      summary="Store a newly created License in storage",
     *      tags={"License"},
     *      description="Store License",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="License that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/License")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/License"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateLicenseAPIRequest $request)
    {
        $input = $request->all();

        $license = $this->licenseRepository->create($input);

        return $this->sendResponse($license->toArray(), 'License saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/licenses/{id}",
     *      summary="Display the specified License",
     *      tags={"License"},
     *      description="Get License",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of License",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/License"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var License $license */
        $license = $this->licenseRepository->find($id);

        if (empty($license)) {
            return $this->sendError('License not found');
        }

        return $this->sendResponse($license->toArray(), 'License retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateLicenseAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/licenses/{id}",
     *      summary="Update the specified License in storage",
     *      tags={"License"},
     *      description="Update License",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of License",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="License that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/License")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/License"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateLicenseAPIRequest $request)
    {
        $input = $request->all();

        /** @var License $license */
        $license = $this->licenseRepository->find($id);

        if (empty($license)) {
            return $this->sendError('License not found');
        }

        $license = $this->licenseRepository->update($input, $id);

        return $this->sendResponse($license->toArray(), 'License updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/licenses/{id}",
     *      summary="Remove the specified License from storage",
     *      tags={"License"},
     *      description="Delete License",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of License",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var License $license */
        $license = $this->licenseRepository->find($id);

        if (empty($license)) {
            return $this->sendError('License not found');
        }

        $license->delete();

        return $this->sendResponse($id, 'License deleted successfully');
    }
}
