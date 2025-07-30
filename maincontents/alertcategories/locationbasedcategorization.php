<?php
// Section Start: PHP Logic
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = "";
$locations = [
    ['id' => 'LOC-001', 'name' => 'Barangay 1 (Central)', 'description' => 'Residential area, North sector.', 'population_estimate' => 5000, 'status' => 'Active'],
    ['id' => 'LOC-002', 'name' => 'Commercial District', 'description' => 'Main business and shopping area.', 'population_estimate' => 8000, 'status' => 'Active'],
    ['id' => 'LOC-003', 'name' => 'Industrial Zone', 'description' => 'Factories and warehouses.', 'population_estimate' => 2000, 'status' => 'Active'],
    ['id' => 'LOC-004', 'name' => 'School Zone A (East)', 'description' => 'Includes Elementary and High School.', 'population_estimate' => 3000, 'status' => 'Active'],
    ['id' => 'LOC-005', 'name' => 'Flood Zone C (South)', 'description' => 'Area prone to flooding.', 'population_estimate' => 1500, 'status' => 'Active'],
    ['id' => 'LOC-006', 'name' => 'District 3', 'description' => 'Covers Barangays 1, 2, 3.', 'population_estimate' => 12000, 'status' => 'Active'],
    ['id' => 'LOC-007', 'name' => 'Sitio Tagumpay (Rizal)', 'description' => 'Specific sub-locality prone to landslides.', 'population_estimate' => 800, 'status' => 'Active'],
];
// Section End: PHP Logic
?>
<div class=" text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Location-Based Categorization</h1>
        <?php
        $hasProfilePic = !empty($userProfilePic);

        if ($isLoggedIn) :
        ?>
            <div class="flex items-center space-x-3">
                <?php if ($hasProfilePic) : ?>
                    <img src="<?php echo htmlspecialchars($userProfilePic); ?>"
                         alt="<?php echo htmlspecialchars($userName); ?>'s Profile Picture"
                         class="w-10 h-10 rounded-full object-cover border-2 border-blue-400">
                <?php else : ?>
                    <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center border-2 border-gray-400">
                        <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                <?php endif; ?>
                <span class="text-lg font-medium hidden md:block"><?php echo htmlspecialchars($userName); ?></span>
            </div>
        <?php endif; ?>
    </header>
    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Tag Alerts by Geographic Area</h2>
        <p class="text-gray-700 leading-relaxed mb-6">
            Assign one or more specific geographic areas or zones to an alert for precise targeting and relevant dissemination.
        </p>

        <div class="space-y-4">
            <div>
                <label for="alert_message" class="block text-sm font-medium text-gray-700">Alert Message (Context for tagging)</label>
                <textarea id="alert_message" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., Sudden landslide reported in Sitio Tagumpay, Barangay Rizal."></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Select Affected Locations</label>
                <div class="border border-dashed border-gray-300 p-6 rounded-md text-center text-gray-500 mb-4">
                    <p class="mb-2">Placeholder for Map Interface</p>
                    <p class="text-xs">Click or drag on a map to visually select affected zones (Feature to be implemented via mapping API).</p>
                </div>

                <label for="manual_locations" class="block text-sm font-medium text-gray-700">Manual Selection of Specific Areas</label>
                <select id="manual_locations" multiple class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                    <?php foreach ($locations as $loc) : ?>
                        <option value="<?php echo htmlspecialchars($loc['id']); ?>"><?php echo htmlspecialchars($loc['name']); ?> (Pop. Est: <?php echo number_format($loc['population_estimate']); ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="text-right">
                <button id="tag_locations_button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                    Tag Locations
                </button>
            </div>

            <div id="tagged_results" class="hidden bg-gray-50 p-4 rounded-md border border-gray-200">
                <h3 class="text-lg font-medium text-gray-800 mb-2">Selected Locations:</h3>
                <ul id="selected_locations_list" class="list-disc list-inside text-gray-700"></ul>
            </div>
        </div>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Manage Geographic Zones</h2>
        <p class="text-gray-700 leading-relaxed mb-6">
            Define, update, or remove geographic zones used for location-based alert targeting.
        </p>

        <div class="mb-6 text-right">
            <button onclick="openLocationModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Add New Zone
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Population Estimate</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($locations)) : ?>
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">No locations defined.</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($locations as $loc) : ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($loc['id']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($loc['name']); ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900"><?php echo htmlspecialchars($loc['description']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo number_format($loc['population_estimate']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo $loc['status'] == 'Active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                                        <?php echo htmlspecialchars($loc['status']); ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button onclick="openLocationModal('edit', '<?php echo htmlspecialchars($loc['id']); ?>')" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                                    <button onclick="deleteLocation('<?php echo htmlspecialchars($loc['id']); ?>')" class="text-red-600 hover:text-red-900">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<div id="locationModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="location-modal-title">
                            Manage Location Zone
                        </h3>
                        <div class="mt-2">
                            <form class="space-y-4">
                                <div>
                                    <label for="locationId" class="block text-sm font-medium text-gray-700">Location ID</label>
                                    <input type="text" id="locationId" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" readonly>
                                </div>
                                <div>
                                    <label for="locationName" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" id="locationName" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                                </div>
                                <div>
                                    <label for="locationDescription" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea id="locationDescription" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
                                </div>
                                <div>
                                    <label for="locationPopulation" class="block text-sm font-medium text-gray-700">Population Estimate</label>
                                    <input type="number" id="locationPopulation" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" min="0">
                                </div>
                                <div>
                                    <label for="locationStatus" class="block text-sm font-medium text-gray-700">Status</label>
                                    <select id="locationStatus" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" id="saveLocationBtn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Save
                </button>
                <button type="button" onclick="closeLocationModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function tagLocations() {
        const selectedLocations = Array.from(document.getElementById('manual_locations').selectedOptions).map(option => option.text);
        const listElement = document.getElementById('selected_locations_list');
        listElement.innerHTML = '';

        if (selectedLocations.length > 0) {
            selectedLocations.forEach(loc => {
                const li = document.createElement('li');
                li.textContent = loc;
                listElement.appendChild(li);
            });
            document.getElementById('tagged_results').classList.remove('hidden');
        } else {
            document.getElementById('tagged_results').classList.add('hidden');
        }
    }

    let current_location_id = null;

    function openLocationModal(mode, id = null) {
        current_location_id = id;
        const modal = document.getElementById('locationModal');
        const modalTitle = document.getElementById('location-modal-title');
        const locationIdField = document.getElementById('locationId');
        const locationNameField = document.getElementById('locationName');
        const locationDescriptionField = document.getElementById('locationDescription');
        const locationPopulationField = document.getElementById('locationPopulation');
        const locationStatusField = document.getElementById('locationStatus');

        if (mode === 'new') {
            modalTitle.innerText = 'Add New Location Zone';
            locationIdField.value = 'LOC-' + Math.floor(Math.random() * 1000).toString().padStart(3, '0');
            locationNameField.value = '';
            locationDescriptionField.value = '';
            locationPopulationField.value = '';
            locationStatusField.value = 'Active';
            locationIdField.readOnly = true;
        } else if (mode === 'edit' && id) {
            modalTitle.innerText = 'Edit Location Zone';
            locationIdField.readOnly = true;
            const location = <?php echo json_encode($locations); ?>.find(l => l.id === id);
            if (location) {
                locationIdField.value = location.id;
                locationNameField.value = location.name;
                locationDescriptionField.value = location.description;
                locationPopulationField.value = location.population_estimate;
                locationStatusField.value = location.status;
            }
        }
        modal.classList.remove('hidden');
    }

    function closeLocationModal() {
        document.getElementById('locationModal').classList.add('hidden');
    }

    function saveLocation() {
        const id = document.getElementById('locationId').value;
        const name = document.getElementById('locationName').value;
        const description = document.getElementById('locationDescription').value;
        const population = document.getElementById('locationPopulation').value;
        const status = document.getElementById('locationStatus').value;

        alert(`Saving Location:\nID: ${id}\nName: ${name}\nDescription: ${description}\nPopulation: ${population}\nStatus: ${status}`);
        closeLocationModal();
        location.reload();
    }

    function deleteLocation(id) {
        if (confirm(`Are you sure you want to delete location ${id}?`)) {
            alert(`Deleting location ${id}`);
            location.reload();
        }
    }

    document.getElementById('tag_locations_button').addEventListener('click', tagLocations);
    document.getElementById('saveLocationBtn').addEventListener('click', saveLocation);
</script>