<?php

namespace App\Repository\Camp;

use App\Models\Camp;

interface CampRepositoryInterface
{
    /**
     * Retrieve all camps.
     *
     * @return array
     */
    public function index();

    /**
     * Store a new camp in the database.
     *
     * @param array $data The data for the new camp.
     * @return void
     */
    public function store(array $data);

    /**
     * Update a camp with the given data.
     *
     * @param array $data The data to update the camp with.
     * @param Camp $camp The camp to be updated.
     * @return void
     */
    public function update(array $data, Camp $camp);

    /**
     * Show a camp.
     *
     * @param Camp $camp The camp to show.
     * @return void
     */
    public function show(Camp $camp);

    /**
     * Destroy a camp.
     *
     * @param Camp $camp The camp to be destroyed.
     * @return void
     */
    public function destroy(Camp $camp);

    /**
     * Retrieves the teams associated with the camp.
     *
     * @return array The teams associated with the camp.
     */
    public function getTeams();
}