<?php
// Section Start: PHP Logic
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = "";
$eventTypes = [
    ['id' => 'ET-001', 'name' => 'Fire', 'description' => 'Incidents involving fire.', 'status' => 'Active'],
    ['id' => 'ET-002', 'name' => 'Flood', 'description' => 'Water-related emergencies.', 'status' => 'Active'],
    ['id' => 'ET-003', 'name' => 'Earthquake', 'description' => 'Seismic activity alerts.', 'status' => 'Active'],
    ['id' => 'ET-004', 'name' => 'Security Breach', 'description' => 'Unauthorized access or threat.', 'status' => 'Active'],
    ['id' => 'ET-005', 'name' => 'Weather Alert', 'description' => 'Warnings for severe weather conditions.', 'status' => 'Active'],
    ['id' => 'ET-006', 'name' => 'Health Emergency', 'description' => 'Public health crises or medical incidents.', 'status' => 'Active'],
    ['id' => 'ET-007', 'name' => 'Bomb Threat', 'description' => 'Threats involving explosive devices.', 'status' => 'Active'],
    ['id' => 'ET-008', 'name' => 'General Warning', 'description' => 'General advisories or warnings.', 'status' => 'Active'],
];
// Section End: PHP Logic
?>
<div class=" text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Event Type Classifier</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Categorize Incoming Incidents</h2>
        <p class="text-gray-700 leading-relaxed mb-6">
            Input a raw alert message to automatically classify its event type, or manually override the prediction.
        </p>

        <div class="space-y-4">
            <div>
                <label for="alert_message" class="block text-sm font-medium text-gray-700">Raw Alert Message Input</label>
                <textarea id="alert_message" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., Heavy rain and strong winds expected. Prepare for flooding."></textarea>
            </div>
            <div class="text-right">
                <button id="classify_button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2h2V1a1 1 0 112 0v2h2a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 3a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h.01a1 1 0 100-2H10zm3 0a1 1 0 000 2h.01a1 1 0 100-2H13zm-3 4a1 1 0 000 2h.01a1 1 0 100-2H10zm3 0a1 1 0 000 2h.01a1 1 0 100-2H13z" clip-rule="evenodd"></path></svg>
                    Classify Incident
                </button>
            </div>

            <div id="classification_results" class="hidden bg-gray-50 p-4 rounded-md border border-gray-200">
                <h3 class="text-lg font-medium text-gray-800 mb-2">Classification Result:</h3>
                <p class="text-gray-700"><strong>Predicted Event Type:</strong> <span id="predicted_type" class="font-semibold text-blue-700"></span></p>
                <p class="text-gray-700"><strong>Confidence Score:</strong> <span id="confidence_score" class="font-semibold text-blue-700"></span></p>

                <div class="mt-4">
                    <label for="manual_override" class="block text-sm font-medium text-gray-700">Manual Override (if needed)</label>
                    <select id="manual_override" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option value="">-- Select to Override --</option>
                        <?php foreach ($eventTypes as $type) : ?>
                            <option value="<?php echo htmlspecialchars($type['id']); ?>"><?php echo htmlspecialchars($type['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mt-4 text-right">
                    <button id="confirm_classification" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        Confirm Classification
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Event Type Management</h2>
        <p class="text-gray-700 leading-relaxed mb-6">
            Add, edit, or remove event types to refine the classification system and manual override options.
        </p>

        <div class="mb-6 text-right">
            <button onclick="openEventTypeModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Add New Event Type
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($eventTypes)) : ?>
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No event types defined.</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($eventTypes as $type) : ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($type['id']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($type['name']); ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900"><?php echo htmlspecialchars($type['description']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo $type['status'] == 'Active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                                        <?php echo htmlspecialchars($type['status']); ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button onclick="openEventTypeModal('edit', '<?php echo htmlspecialchars($type['id']); ?>')" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                                    <button onclick="deleteEventType('<?php echo htmlspecialchars($type['id']); ?>')" class="text-red-600 hover:text-red-900">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<div id="eventTypeModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Manage Event Type
                        </h3>
                        <div class="mt-2">
                            <form class="space-y-4">
                                <div>
                                    <label for="eventTypeId" class="block text-sm font-medium text-gray-700">Event Type ID</label>
                                    <input type="text" id="eventTypeId" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" readonly>
                                </div>
                                <div>
                                    <label for="eventTypeName" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" id="eventTypeName" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                                </div>
                                <div>
                                    <label for="eventTypeDescription" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea id="eventTypeDescription" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
                                </div>
                                <div>
                                    <label for="eventTypeStatus" class="block text-sm font-medium text-gray-700">Status</label>
                                    <select id="eventTypeStatus" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
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
                <button type="button" id="saveEventTypeBtn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Save
                </button>
                <button type="button" onclick="closeEventTypeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function classifyIncident() {
        document.getElementById('predicted_type').innerText = 'Weather Alert';
        document.getElementById('confidence_score').innerText = '92%';
        document.getElementById('classification_results').classList.remove('hidden');
    }

    function confirmClassification() {
        alert('Incident classified and confirmed!');
        document.getElementById('classification_results').classList.add('hidden');
        document.getElementById('alert_message').value = '';
        document.getElementById('manual_override').value = '';
    }

    let currentEventTypeId = null;

    function openEventTypeModal(mode, id = null) {
        currentEventTypeId = id;
        const modal = document.getElementById('eventTypeModal');
        const modalTitle = document.getElementById('modal-title');
        const eventTypeIdField = document.getElementById('eventTypeId');
        const eventTypeNameField = document.getElementById('eventTypeName');
        const eventTypeDescriptionField = document.getElementById('eventTypeDescription');
        const eventTypeStatusField = document.getElementById('eventTypeStatus');

        if (mode === 'new') {
            modalTitle.innerText = 'Add New Event Type';
            eventTypeIdField.value = 'ET-' + Math.floor(Math.random() * 1000).toString().padStart(3, '0');
            eventTypeNameField.value = '';
            eventTypeDescriptionField.value = '';
            eventTypeStatusField.value = 'Active';
            eventTypeIdField.readOnly = true;
        } else if (mode === 'edit' && id) {
            modalTitle.innerText = 'Edit Event Type';
            eventTypeIdField.readOnly = true;
            const eventType = <?php echo json_encode($eventTypes); ?>.find(e => e.id === id);
            if (eventType) {
                eventTypeIdField.value = eventType.id;
                eventTypeNameField.value = eventType.name;
                eventTypeDescriptionField.value = eventType.description;
                eventTypeStatusField.value = eventType.status;
            }
        }
        modal.classList.remove('hidden');
    }

    function closeEventTypeModal() {
        document.getElementById('eventTypeModal').classList.add('hidden');
    }

    function saveEventType() {
        const id = document.getElementById('eventTypeId').value;
        const name = document.getElementById('eventTypeName').value;
        const description = document.getElementById('eventTypeDescription').value;
        const status = document.getElementById('eventTypeStatus').value;

        alert(`Saving Event Type:\nID: ${id}\nName: ${name}\nDescription: ${description}\nStatus: ${status}`);
        closeEventTypeModal();
        location.reload();
    }

    function deleteEventType(id) {
        if (confirm(`Are you sure you want to delete event type ${id}?`)) {
            alert(`Deleting event type ${id}`);
            location.reload();
        }
    }

    document.getElementById('classify_button').addEventListener('click', classifyIncident);
    document.getElementById('confirm_classification').addEventListener('click', confirmClassification);
    document.getElementById('saveEventTypeBtn').addEventListener('click', saveEventType);
</script>