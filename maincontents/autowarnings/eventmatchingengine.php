<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for event matching rules.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample event matching rules
$eventMatchingRules = [
    [
        'id' => 'EME-001',
        'name' => 'Critical Flood Alert Match',
        'event_type' => 'Flood Alert',
        'matching_criteria' => 'Severity: Critical, Location: Flood Zone C',
        'action_type' => 'Send Priority Broadcast',
        'action_details' => 'Broadcast ID: BC-FLOOD-URGENT',
        'status' => 'Active',
        'last_triggered' => '2025-07-27 10:30 AM',
        'description' => 'Matches critical flood alerts for immediate priority broadcasting.'
    ],
    [
        'id' => 'EME-002',
        'name' => 'Earthquake Safety Tips Trigger',
        'event_type' => 'Earthquake Detection',
        'matching_criteria' => 'Magnitude: >= 5.0, Region: Metro Manila',
        'action_type' => 'Activate Auto-Responder',
        'action_details' => 'Auto-Responder ID: AR-002 (Earthquake Safety Tips)',
        'status' => 'Active',
        'last_triggered' => '2025-07-20 02:00 PM',
        'description' => 'Triggers an auto-responder with safety tips for significant earthquakes.'
    ],
    [
        'id' => 'EME-003',
        'name' => 'High Severity Incident Escalation',
        'event_type' => 'Incident Report',
        'matching_criteria' => 'Severity: High, Status: New',
        'action_type' => 'Escalate to Team', // Fixed: Added '=>' here
        'action_details' => 'Team: Emergency Management, Method: SMS/Email',
        'status' => 'Inactive',
        'last_triggered' => 'N/A',
        'description' => 'Escalates newly reported high-severity incidents to the emergency management team.'
    ]
];

// Sample options for dropdowns
$eventTypes = ['All', 'Flood Alert', 'Earthquake Detection', 'Incident Report', 'Weather Warning', 'System Notification', 'Other'];
$actionTypes = ['All', 'Send Priority Broadcast', 'Activate Auto-Responder', 'Escalate to Team', 'Log Event', 'Notify Admin', 'Other'];
$ruleStatuses = ['All', 'Active', 'Inactive'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Event Matching Engine</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Define Rules for Automated Event Response</h2>
        <p class="text-gray-700 leading-relaxed">
            The Event Matching Engine allows administrators to define sophisticated rules that automatically detect and respond to specific events or data patterns within the system. This enables proactive actions, such as triggering alerts, escalating incidents, or activating auto-responders, based on real-time conditions.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Configured Event Matching Rules</h2>

        <div class="mb-6 flex justify-between items-center">
            <!-- Filter Controls -->
            <div class="flex space-x-4">
                <div>
                    <label for="filterStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                    <select id="filterStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($ruleStatuses as $status) : ?>
                            <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterEventType" class="block text-sm font-medium text-gray-700">Filter by Event Type:</label>
                    <select id="filterEventType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($eventTypes as $type) : ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterActionType" class="block text-sm font-medium text-gray-700">Filter by Action Type:</label>
                    <select id="filterActionType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($actionTypes as $type) : ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button onclick="openRuleConfigModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Add New Rule
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Rule Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Event Type</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Action Type</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Last Triggered</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="ruleTableBody">
                    <!-- Rules will be rendered here by JavaScript -->
                    <?php if (empty($eventMatchingRules)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No event matching rules configured.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals (re-using pattern) -->
    <!-- Rule Configuration Modal (Add/Edit) -->
    <div id="ruleConfigModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4" id="ruleConfigModalTitle">Add New Event Matching Rule</h3>
            <form id="ruleConfigForm" onsubmit="return saveRule(event)">
                <input type="hidden" id="ruleId">
                <div class="mb-4">
                    <label for="ruleName" class="block text-sm font-medium text-gray-700">Rule Name</label>
                    <input type="text" id="ruleName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="eventType" class="block text-sm font-medium text-gray-700">Event Type</label>
                    <select id="eventType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach (array_slice($eventTypes, 1) as $type) : // Exclude 'All' ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="matchingCriteria" class="block text-sm font-medium text-gray-700">Matching Criteria</label>
                    <textarea id="matchingCriteria" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., Severity: Critical, Location: Flood Zone C" required></textarea>
                    <p class="mt-1 text-xs text-gray-500">Define conditions for the rule to trigger.</p>
                </div>
                <div class="mb-4">
                    <label for="actionType" class="block text-sm font-medium text-gray-700">Action Type</label>
                    <select id="actionType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach (array_slice($actionTypes, 1) as $type) : // Exclude 'All' ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="actionDetails" class="block text-sm font-medium text-gray-700">Action Details (JSON/Text)</label>
                    <textarea id="actionDetails" rows="5" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm font-mono" placeholder='e.g., {"broadcast_id": "BC-URGENT", "team": "Emergency"}'></textarea>
                    <p class="mt-1 text-xs text-gray-500">Provide specific parameters for the action.</p>
                </div>
                <div class="mb-4">
                    <label for="ruleDescription" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                    <textarea id="ruleDescription" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Brief description of this event matching rule"></textarea>
                </div>
                <div class="mb-4">
                    <label for="ruleStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="ruleStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeRuleConfigModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Save Rule
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Rule Details Modal -->
    <div id="ruleDetailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Event Matching Rule Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>ID:</strong> <span id="modalRuleId"></span></p>
                <p><strong>Name:</strong> <span id="modalRuleName"></span></p>
                <p><strong>Event Type:</strong> <span id="modalEventType"></span></p>
                <p><strong>Matching Criteria:</strong> <span id="modalMatchingCriteria"></span></p>
                <p><strong>Action Type:</strong> <span id="modalActionType"></span></p>
                <p><strong>Action Details:</strong></p>
                <pre id="modalActionDetails" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[100px] overflow-auto text-sm font-mono"></pre>
                <p><strong>Status:</strong> <span id="modalRuleStatus"></span></p>
                <p><strong>Last Triggered:</strong> <span id="modalLastTriggered"></span></p>
                <p><strong>Description:</strong></p>
                <div id="modalRuleDescription" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
            </div>
            <div class="mt-6 text-right">
                <button id="closeRuleDetailsModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
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
    // Initial event matching rules data from PHP
    let eventMatchingRulesData = <?php echo json_encode($eventMatchingRules); ?>;

    // Get references to DOM elements
    const ruleTableBody = document.getElementById('ruleTableBody');
    const filterStatusSelect = document.getElementById('filterStatus');
    const filterEventTypeSelect = document.getElementById('filterEventType');
    const filterActionTypeSelect = document.getElementById('filterActionType');

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
     * Renders the event matching rules table based on the provided data.
     * @param {Array} dataToRender - The array of rule objects to display.
     */
    function renderRuleTable(dataToRender) {
        ruleTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="7" class="px-6 py-4 text-center text-gray-500">No event matching rules configured.</td>`;
            ruleTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(rule => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (rule.status === 'Active') statusClass = 'bg-green-100 text-green-800';
            else if (rule.status === 'Inactive') statusClass = 'bg-red-100 text-red-800';
            else statusClass = 'bg-gray-100 text-gray-800'; // Default

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${rule.id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${rule.name}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${rule.event_type}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${rule.action_type}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${rule.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${rule.last_triggered || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewRuleDetails('${encodeURIComponent(JSON.stringify(rule))}')" class="text-indigo-600 hover:text-indigo-900 mr-4">View</button>
                    <button onclick="openRuleConfigModal('edit', '${encodeURIComponent(JSON.stringify(rule))}')" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                    <button onclick="testRule('${rule.id}')" class="text-yellow-600 hover:text-yellow-900 mr-4">Test</button>
                    <button onclick="deleteRule('${rule.id}')" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            `;
            ruleTableBody.appendChild(row);
        });
    }

    /**
     * Filters the event matching rules data based on selected criteria and re-renders the table.
     */
    function filterRules() {
        const selectedStatus = filterStatusSelect.value;
        const selectedEventType = filterEventTypeSelect.value;
        const selectedActionType = filterActionTypeSelect.value;

        const filteredData = eventMatchingRulesData.filter(rule => {
            const matchesStatus = selectedStatus === 'All' || rule.status === selectedStatus;
            const matchesEventType = selectedEventType === 'All' || rule.event_type === selectedEventType;
            const matchesActionType = selectedActionType === 'All' || rule.action_type === selectedActionType;
            return matchesStatus && matchesEventType && matchesActionType;
        });

        renderRuleTable(filteredData);
    }

    // Event listeners for filter changes
    filterStatusSelect.addEventListener('change', filterRules);
    filterEventTypeSelect.addEventListener('change', filterRules);
    filterActionTypeSelect.addEventListener('change', filterRules);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderRuleTable(eventMatchingRulesData);

        // Get elements for Rule Config Modal
        const ruleConfigModal = document.getElementById('ruleConfigModal');
        const ruleConfigModalTitle = document.getElementById('ruleConfigModalTitle');
        const ruleIdField = document.getElementById('ruleId');
        const ruleNameField = document.getElementById('ruleName');
        const eventTypeField = document.getElementById('eventType');
        const matchingCriteriaField = document.getElementById('matchingCriteria');
        const actionTypeField = document.getElementById('actionType');
        const actionDetailsField = document.getElementById('actionDetails');
        const ruleDescriptionField = document.getElementById('ruleDescription');
        const ruleStatusField = document.getElementById('ruleStatus');

        /**
         * Opens the rule configuration modal for adding new or editing existing rules.
         * @param {string} mode - 'new' or 'edit'.
         * @param {string} [ruleJson=null] - JSON string of the rule data if in 'edit' mode.
         */
        window.openRuleConfigModal = function(mode, ruleJson = null) {
            ruleConfigModal.classList.remove('hidden');
            if (mode === 'new') {
                ruleConfigModalTitle.textContent = 'Add New Event Matching Rule';
                ruleIdField.value = '';
                ruleNameField.value = '';
                eventTypeField.value = 'Flood Alert'; // Default
                matchingCriteriaField.value = '';
                actionTypeField.value = 'Send Priority Broadcast'; // Default
                actionDetailsField.value = '';
                ruleDescriptionField.value = '';
                ruleStatusField.value = 'Active';
            } else if (mode === 'edit' && ruleJson) {
                const rule = JSON.parse(decodeURIComponent(ruleJson));
                ruleConfigModalTitle.textContent = 'Edit Event Matching Rule';
                ruleIdField.value = rule.id;
                ruleNameField.value = rule.name;
                eventTypeField.value = rule.event_type;
                matchingCriteriaField.value = rule.matching_criteria;
                actionTypeField.value = rule.action_type;
                actionDetailsField.value = rule.action_details;
                ruleDescriptionField.value = rule.description;
                ruleStatusField.value = rule.status;
            }
        };

        /**
         * Closes the rule configuration modal.
         */
        window.closeRuleConfigModal = function() {
            ruleConfigModal.classList.add('hidden');
        };

        /**
         * Handles saving (adding or updating) an event matching rule.
         * @param {Event} event - The form submission event.
         */
        window.saveRule = function(event) {
            event.preventDefault(); // Prevent default form submission

            const id = ruleIdField.value;
            const name = ruleNameField.value.trim();
            const event_type = eventTypeField.value;
            const matching_criteria = matchingCriteriaField.value.trim();
            const action_type = actionTypeField.value;
            const action_details = actionDetailsField.value.trim();
            const description = ruleDescriptionField.value.trim();
            const status = ruleStatusField.value;

            if (!name || !event_type || !matching_criteria || !action_type) {
                showAlert('Please fill in all required fields (Rule Name, Event Type, Matching Criteria, Action Type).', 'Input Error');
                return false;
            }

            const now = new Date();
            const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;

            const newRule = {
                id: id || 'EME-' + (eventMatchingRulesData.length + 1).toString().padStart(3, '0'), // Simple ID generation
                name: name,
                event_type: event_type,
                matching_criteria: matching_criteria,
                action_type: action_type,
                action_details: action_details,
                status: status,
                last_triggered: timestamp,
                description: description
            };

            if (id) {
                // Update existing
                const index = eventMatchingRulesData.findIndex(rule => rule.id === id);
                if (index !== -1) {
                    eventMatchingRulesData[index] = newRule;
                    showAlert(`Event Matching Rule "${name}" updated successfully!`, 'Success');
                }
            } else {
                // Add new
                eventMatchingRulesData.push(newRule);
                showAlert(`Event Matching Rule "${name}" added successfully!`, 'Success');
            }

            closeRuleConfigModal();
            filterRules(); // Re-render table with updated data
            return false; // Prevent actual form submission
        };

        /**
         * Opens the rule details modal with the given rule's data.
         * @param {string} ruleJson - JSON string of the rule entry.
         */
        window.viewRuleDetails = function(ruleJson) {
            const rule = JSON.parse(decodeURIComponent(ruleJson));
            document.getElementById('modalRuleId').textContent = rule.id;
            document.getElementById('modalRuleName').textContent = rule.name;
            document.getElementById('modalEventType').textContent = rule.event_type;
            document.getElementById('modalMatchingCriteria').textContent = rule.matching_criteria;
            document.getElementById('modalActionType').textContent = rule.action_type;
            document.getElementById('modalActionDetails').textContent = rule.action_details || 'No specific action details.';
            document.getElementById('modalRuleStatus').textContent = rule.status;
            document.getElementById('modalLastTriggered').textContent = rule.last_triggered || 'N/A';
            document.getElementById('modalRuleDescription').textContent = rule.description || 'No description provided.';

            document.getElementById('ruleDetailsModal').classList.remove('hidden');
        };

        // Close rule details modal
        document.getElementById('closeRuleDetailsModal').addEventListener('click', function() {
            document.getElementById('ruleDetailsModal').classList.add('hidden');
        });

        /**
         * Simulates testing an event matching rule.
         * In a real app, this would involve simulating an event and checking if the rule triggers correctly.
         * @param {string} id - The ID of the rule to test.
         */
        window.testRule = function(id) {
            showConfirm(`Are you sure you want to test event matching rule ${id}? This will simulate an event trigger.`, (confirmed) => {
                if (confirmed) {
                    showAlert(`Simulating test for rule ${id}... (Check console for simulated trigger)`, 'Testing Rule');
                    const index = eventMatchingRulesData.findIndex(rule => rule.id === id);
                    if (index !== -1) {
                        // Simulate rule trigger success/failure
                        const isTriggered = Math.random() > 0.1; // 90% chance of triggering
                        const now = new Date();
                        const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;
                        eventMatchingRulesData[index].last_triggered = timestamp;

                        if (isTriggered) {
                            console.log(`Rule ${id} Test Result: SUCCESS! Rule triggered. Simulated action: ${eventMatchingRulesData[index].action_type}`);
                            showAlert(`Rule ${id} triggered successfully!`, 'Test Result');
                        } else {
                            console.error(`Rule ${id} Test Result: FAILED! Rule did not trigger. Conditions not met.`);
                            showAlert(`Rule ${id} did not trigger. Check matching criteria.`, 'Test Result (Failed)');
                        }
                        filterRules(); // Re-render table to show updated last_triggered timestamp
                    }
                }
            }, 'Test Event Matching Rule');
        };

        /**
         * Deletes an event matching rule.
         * @param {string} id - The ID of the rule to delete.
         */
        window.deleteRule = function(id) {
            showConfirm(`Are you sure you want to delete event matching rule ${id}? This action cannot be undone.`, (confirmed) => {
                if (confirmed) {
                    eventMatchingRulesData = eventMatchingRulesData.filter(rule => rule.id !== id);
                    showAlert(`Event matching rule ${id} deleted successfully.`, 'Rule Deleted');
                    filterRules(); // Re-render table
                }
            }, 'Delete Event Matching Rule');
        };
    });
</script>
