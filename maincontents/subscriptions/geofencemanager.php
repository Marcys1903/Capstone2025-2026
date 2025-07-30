<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for geofence configurations.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample geofence data
$geofences = [
    [
        'id' => 'GEO-001',
        'name' => 'Barangay 1 Evacuation Zone',
        'type' => 'Circular',
        'coordinates' => 'Lat: 14.7123, Lon: 121.0567',
        'radius' => '500m',
        'status' => 'Active',
        'last_updated' => '2025-07-28 03:00 PM',
        'description' => 'Primary evacuation zone for Barangay 1 residents. Circular, 500m radius.'
    ],
    [
        'id' => 'GEO-002',
        'name' => 'Commercial District Alert Area',
        'type' => 'Polygon',
        'coordinates' => '[[14.7000, 121.0000], [14.7050, 121.0050], [14.7025, 121.0100]]', // Simplified JSON array of points
        'radius' => 'N/A',
        'status' => 'Active',
        'last_updated' => '2025-07-28 02:30 PM',
        'description' => 'Defined polygon area for commercial establishments, critical for business alerts.'
    ],
    [
        'id' => 'GEO-003',
        'name' => 'School Zone A Safety Perimeter',
        'type' => 'Circular',
        'coordinates' => 'Lat: 14.7200, Lon: 121.0400',
        'radius' => '200m',
        'status' => 'Inactive',
        'last_updated' => '2025-07-27 10:00 AM',
        'description' => 'Safety perimeter around School Zone A, currently inactive for drills.'
    ],
    [
        'id' => 'GEO-004',
        'name' => 'Industrial Zone Entry Point',
        'type' => 'Point',
        'coordinates' => 'Lat: 14.6950, Lon: 121.0600',
        'radius' => 'N/A',
        'status' => 'Active',
        'last_updated' => '2025-07-27 01:00 PM',
        'description' => 'Specific point of interest for industrial zone access control.'
    ]
];

// Sample options for dropdowns
$geofenceTypes = ['All', 'Circular', 'Polygon', 'Point', 'Other'];
$geofenceStatuses = ['All', 'Active', 'Inactive'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Geofence Manager</h1>
        <?php
        $hasProfilePic = !empty($userProfilePic);
        if ($isLoggedIn) : ?>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Define and Manage Geographic Boundaries</h2>
        <p class="text-gray-700 leading-relaxed">
            The Geofence Manager module allows administrators to define, visualize (simulated), and manage virtual geographic boundaries (geofences). These geofences can be used to trigger location-based alerts, track asset movements, or manage emergency zones, enhancing situational awareness and automated responses.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Configured Geofences</h2>

        <div class="mb-6 flex justify-between items-center">
            <!-- Filter Controls -->
            <div class="flex space-x-4">
                <div>
                    <label for="filterStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                    <select id="filterStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($geofenceStatuses as $status) : ?>
                            <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterType" class="block text-sm font-medium text-gray-700">Filter by Type:</label>
                    <select id="filterType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($geofenceTypes as $type) : ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button onclick="openConfigModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Add New Geofence
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Coordinates</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Radius</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="geofenceTableBody">
                    <!-- Geofences will be rendered here by JavaScript -->
                    <?php if (empty($geofences)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No geofences configured.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals -->
    <!-- Geofence Configuration Modal (Add/Edit) -->
    <div id="configModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4" id="configModalTitle">Add New Geofence</h3>
            <form id="configForm" onsubmit="return saveGeofence(event)">
                <input type="hidden" id="geofenceId">
                <div class="mb-4">
                    <label for="geofenceName" class="block text-sm font-medium text-gray-700">Geofence Name</label>
                    <input type="text" id="geofenceName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="geofenceType" class="block text-sm font-medium text-gray-700">Type</label>
                    <select id="geofenceType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach (array_slice($geofenceTypes, 1) as $type) : // Exclude 'All' ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="geofenceCoordinates" class="block text-sm font-medium text-gray-700">Coordinates (e.g., Lat: 14.7, Lon: 121.0 or JSON for Polygon)</label>
                    <input type="text" id="geofenceCoordinates" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., Lat: 14.7123, Lon: 121.0567" required>
                    <p class="mt-1 text-xs text-gray-500">For Polygon, use JSON array of [lat, lon] pairs: [[lat1, lon1], [lat2, lon2]]</p>
                </div>
                <div class="mb-4">
                    <label for="geofenceRadius" class="block text-sm font-medium text-gray-700">Radius (for Circular, e.g., 500m)</label>
                    <input type="text" id="geofenceRadius" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., 500m (leave blank for Polygon/Point)">
                </div>
                <div class="mb-4">
                    <label for="geofenceDescription" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                    <textarea id="geofenceDescription" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Brief description of this geofence"></textarea>
                </div>
                <div class="mb-4">
                    <label for="geofenceStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="geofenceStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeConfigModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Save Geofence
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Geofence Details Modal -->
    <div id="detailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Geofence Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>ID:</strong> <span id="modalGeofenceId"></span></p>
                <p><strong>Name:</strong> <span id="modalGeofenceName"></span></p>
                <p><strong>Type:</strong> <span id="modalGeofenceType"></span></p>
                <p><strong>Coordinates:</strong> <span id="modalGeofenceCoordinates"></span></p>
                <p><strong>Radius:</strong> <span id="modalGeofenceRadius"></span></p>
                <p><strong>Status:</strong> <span id="modalGeofenceStatus"></span></p>
                <p><strong>Last Updated:</strong> <span id="modalLastUpdated"></span></p>
                <p><strong>Description:</strong></p>
                <div id="modalGeofenceDescription" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
            </div>
            <div class="mt-6 text-right">
                <button id="closeDetailsModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal (re-used) -->
    <div id="confirmationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white text-center">
            <h3 class="text-lg font-bold mb-4" id="confirmationModalTitle">Confirm Action</h3>
            <p class="text-gray-700 mb-6" id="confirmationModalMessage"></p>
            <div class="flex justify-center space-x-4">
                <button id="confirmCancelBtn" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Cancel
                </button>
                <button id="confirmProceedBtn" class="px-4 py-2 text-sm font-medium text-blue-600 rounded-md hover:bg-blue-700">
                    Proceed
                </button>
            </div>
        </div>
    </div>

    <!-- Alert Message Modal (re-used) -->
    <div id="alertModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white text-center">
            <h3 class="text-lg font-bold mb-4" id="alertModalTitle">Notification</h3>
            <p class="text-gray-700 mb-6" id="alertModalMessage"></p>
            <div class="flex justify-center">
                <button id="alertCloseBtn" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                    OK
                </button>
            </div>
        </div>
    </div>

</div>

<script>
    // Initial geofence data from PHP
    let geofencesData = <?php echo json_encode($geofences); ?>;

    // Get references to DOM elements
    const geofenceTableBody = document.getElementById('geofenceTableBody');
    const filterStatusSelect = document.getElementById('filterStatus');
    const filterTypeSelect = document.getElementById('filterType');

    // Custom Alert Modal elements (re-used from other modules)
    const alertModal = document.getElementById('alertModal');
    const alertModalTitle = document.getElementById('alertModalTitle');
    const alertModalMessage = document.getElementById('alertModalMessage');
    const alertCloseBtn = document.getElementById('alertCloseBtn');

    // Custom Confirmation Modal elements (re-used from other modules)
    const confirmationModal = document.getElementById('confirmationModal');
    const confirmationModalTitle = document.getElementById('confirmationModalTitle');
    const confirmationModalMessage = document.getElementById('confirmationModalMessage');
    const confirmCancelBtn = document.getElementById('confirmCancelBtn');
    const confirmProceedBtn = document.getElementById('confirmProceedBtn');
    let confirmCallback = null; // Stores the callback function for confirmation

    /**
     * Shows a custom alert modal.
     * @param {string} message - The message to display.
     * @param {string} [title='Notification'] - The title of the modal.
     */
    function showAlert(message, title = 'Notification') {
        alertModalTitle.textContent = title;
        alertModalMessage.textContent = message;
        alertModal.classList.remove('hidden');
    }

    /**
     * Shows a custom confirmation modal.
     * @param {string} message - The message to display.
     * @param {Function} callback - The function to call if confirmed (true for proceed, false for cancel).
     * @param {string} [title='Confirm Action'] - The title of the modal.
     */
    function showConfirm(message, callback, title = 'Confirm Action') {
        confirmationModalTitle.textContent = title;
        confirmationModalMessage.textContent = message;
        confirmCallback = callback; // Store the callback
        confirmationModal.classList.remove('hidden');
    }

    // Event listeners for custom modals
    alertCloseBtn.addEventListener('click', () => {
        alertModal.classList.add('hidden');
    });

    confirmCancelBtn.addEventListener('click', () => {
        confirmationModal.classList.add('hidden');
        if (confirmCallback) {
            confirmCallback(false); // Call callback with false for cancel
            confirmCallback = null; // Clear callback
        }
    });

    confirmProceedBtn.addEventListener('click', () => {
        confirmationModal.classList.add('hidden');
        if (confirmCallback) {
            confirmCallback(true); // Call callback with true for proceed
            confirmCallback = null; // Clear callback
        }
    });

    /**
     * Renders the geofence table based on the provided data.
     * @param {Array} dataToRender - The array of geofence objects to display.
     */
    function renderGeofenceTable(dataToRender) {
        geofenceTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="7" class="px-6 py-4 text-center text-gray-500">No geofences configured matching filters.</td>`;
            geofenceTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(geofence => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (geofence.status === 'Active') statusClass = 'bg-green-100 text-green-800';
            else if (geofence.status === 'Inactive') statusClass = 'bg-red-100 text-red-800';
            else statusClass = 'bg-gray-100 text-gray-800'; // Default

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${geofence.id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${geofence.name}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${geofence.type}</td>
                <td class="px-6 py-4 text-sm text-gray-700 truncate max-w-xs">${geofence.coordinates}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${geofence.radius || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${geofence.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewDetails('${encodeURIComponent(JSON.stringify(geofence))}')" class="text-indigo-600 hover:text-indigo-900 mr-4">View</button>
                    <button onclick="openConfigModal('edit', '${encodeURIComponent(JSON.stringify(geofence))}')" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                    <button onclick="testGeofence('${geofence.id}')" class="text-yellow-600 hover:text-yellow-900 mr-4">Test</button>
                    <button onclick="deleteGeofence('${geofence.id}')" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            `;
            geofenceTableBody.appendChild(row);
        });
    }

    /**
     * Filters the geofence data based on selected criteria and re-renders the table.
     */
    function filterGeofences() {
        const selectedStatus = filterStatusSelect.value;
        const selectedType = filterTypeSelect.value;

        const filteredData = geofencesData.filter(geofence => {
            const matchesStatus = selectedStatus === 'All' || geofence.status === selectedStatus;
            const matchesType = selectedType === 'All' || geofence.type === selectedType;
            return matchesStatus && matchesType;
        });

        renderGeofenceTable(filteredData);
    }

    // Event listeners for filter changes
    filterStatusSelect.addEventListener('change', filterGeofences);
    filterTypeSelect.addEventListener('change', filterGeofences);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderGeofenceTable(geofencesData);

        // Get elements for Geofence Config Modal
        const configModal = document.getElementById('configModal');
        const configModalTitle = document.getElementById('configModalTitle');
        const geofenceIdField = document.getElementById('geofenceId');
        const geofenceNameField = document.getElementById('geofenceName');
        const geofenceTypeField = document.getElementById('geofenceType');
        const geofenceCoordinatesField = document.getElementById('geofenceCoordinates');
        const geofenceRadiusField = document.getElementById('geofenceRadius');
        const geofenceDescriptionField = document.getElementById('geofenceDescription');
        const geofenceStatusField = document.getElementById('geofenceStatus');

        /**
         * Opens the geofence configuration modal for adding new or editing existing geofences.
         * @param {string} mode - 'new' or 'edit'.
         * @param {string} [geofenceJson=null] - JSON string of the geofence data if in 'edit' mode.
         */
        window.openConfigModal = function(mode, geofenceJson = null) {
            configModal.classList.remove('hidden');
            if (mode === 'new') {
                configModalTitle.textContent = 'Add New Geofence';
                geofenceIdField.value = '';
                geofenceNameField.value = '';
                geofenceTypeField.value = 'Circular'; // Default
                geofenceCoordinatesField.value = '';
                geofenceRadiusField.value = '';
                geofenceDescriptionField.value = '';
                geofenceStatusField.value = 'Active';
            } else if (mode === 'edit' && geofenceJson) {
                const geofence = JSON.parse(decodeURIComponent(geofenceJson));
                configModalTitle.textContent = 'Edit Geofence';
                geofenceIdField.value = geofence.id;
                geofenceNameField.value = geofence.name;
                geofenceTypeField.value = geofence.type;
                geofenceCoordinatesField.value = geofence.coordinates;
                geofenceRadiusField.value = geofence.radius === 'N/A' ? '' : geofence.radius;
                geofenceDescriptionField.value = geofence.description;
                geofenceStatusField.value = geofence.status;
            }
        };

        /**
         * Closes the geofence configuration modal.
         */
        window.closeConfigModal = function() {
            configModal.classList.add('hidden');
        };

        /**
         * Handles saving (adding or updating) a geofence.
         * @param {Event} event - The form submission event.
         */
        window.saveGeofence = function(event) {
            event.preventDefault(); // Prevent default form submission

            const id = geofenceIdField.value;
            const name = geofenceNameField.value.trim();
            const type = geofenceTypeField.value;
            const coordinates = geofenceCoordinatesField.value.trim();
            const radius = geofenceRadiusField.value.trim();
            const description = geofenceDescriptionField.value.trim();
            const status = geofenceStatusField.value;

            if (!name || !type || !coordinates) {
                showAlert('Please fill in all required fields (Geofence Name, Type, Coordinates).', 'Input Error');
                return false;
            }
            if (type === 'Circular' && !radius) {
                showAlert('Radius is required for Circular geofences.', 'Input Error');
                return false;
            }

            const now = new Date();
            const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;

            const newGeofence = {
                id: id || 'GEO-' + (geofencesData.length + 1).toString().padStart(3, '0'), // Simple ID generation
                name: name,
                type: type,
                coordinates: coordinates,
                radius: type === 'Circular' ? radius : 'N/A',
                status: status,
                last_updated: timestamp,
                description: description
            };

            if (id) {
                // Update existing
                const index = geofencesData.findIndex(geofence => geofence.id === id);
                if (index !== -1) {
                    geofencesData[index] = newGeofence;
                    showAlert(`Geofence "${name}" updated successfully!`, 'Success');
                }
            } else {
                // Add new
                geofencesData.push(newGeofence);
                showAlert(`Geofence "${name}" added successfully!`, 'Success');
            }

            closeConfigModal();
            filterGeofences(); // Re-render table with updated data
            return false; // Prevent actual form submission
        };

        /**
         * Opens the geofence details modal with the given geofence's data.
         * @param {string} geofenceJson - JSON string of the geofence entry.
         */
        window.viewDetails = function(geofenceJson) {
            const geofence = JSON.parse(decodeURIComponent(geofenceJson));
            document.getElementById('modalGeofenceId').textContent = geofence.id;
            document.getElementById('modalGeofenceName').textContent = geofence.name;
            document.getElementById('modalGeofenceType').textContent = geofence.type;
            document.getElementById('modalGeofenceCoordinates').textContent = geofence.coordinates;
            document.getElementById('modalGeofenceRadius').textContent = geofence.radius || 'N/A';
            document.getElementById('modalGeofenceStatus').textContent = geofence.status;
            document.getElementById('modalLastUpdated').textContent = geofence.last_updated || 'N/A';
            document.getElementById('modalGeofenceDescription').textContent = geofence.description || 'No description provided.';

            document.getElementById('detailsModal').classList.remove('hidden');
        };

        // Close geofence details modal
        document.getElementById('closeDetailsModal').addEventListener('click', function() {
            document.getElementById('detailsModal').classList.add('hidden');
        });

        /**
         * Simulates testing a geofence.
         * In a real app, this might involve verifying coordinates on a map or checking trigger conditions.
         * @param {string} id - The ID of the geofence to test.
         */
        window.testGeofence = function(id) {
            showConfirm(`Are you sure you want to test geofence ${id}? This will simulate a boundary check.`, (confirmed) => {
                if (confirmed) {
                    showAlert(`Simulating test for geofence ${id}... (Check console for simulated result)`, 'Testing Geofence');
                    const index = geofencesData.findIndex(g => g.id === id);
                    if (index !== -1) {
                        // Simulate test success/failure
                        const isSuccess = Math.random() > 0.1; // 90% chance of success
                        const now = new Date();
                        const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;
                        geofencesData[index].last_updated = timestamp; // Update last_updated on test

                        if (isSuccess) {
                            console.log(`Geofence ${id} Test Result: SUCCESS! Boundary definition is valid.`);
                            showAlert(`Geofence ${id} tested successfully!`, 'Test Result');
                        } else {
                            console.error(`Geofence ${id} Test Result: FAILED! Error: "Invalid coordinates or overlapping boundaries."`);
                            showAlert(`Geofence ${id} test failed! Check configuration.`, 'Test Result (Failed)');
                        }
                        filterGeofences(); // Re-render table to show updated last_updated timestamp
                    }
                }
            }, 'Test Geofence Configuration');
        };

        /**
         * Deletes a geofence.
         * @param {string} id - The ID of the geofence to delete.
         */
        window.deleteGeofence = function(id) {
            showConfirm(`Are you sure you want to delete geofence ${id}? This action cannot be undone.`, (confirmed) => {
                if (confirmed) {
                    geofencesData = geofencesData.filter(geofence => geofence.id !== id);
                    showAlert(`Geofence ${id} deleted successfully.`, 'Geofence Deleted');
                    filterGeofences(); // Re-render table
                }
            }, 'Delete Geofence');
        };
    });
</script>
