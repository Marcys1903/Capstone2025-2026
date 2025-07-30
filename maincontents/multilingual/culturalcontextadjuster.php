<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for cultural context adjustment rules.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample cultural context adjustment rules
$culturalRules = [
    [
        'id' => 'CCA-001',
        'name' => 'Formal Address for Elders (Filipino)',
        'context' => 'Filipino Language',
        'adjustment_type' => 'Tone/Formality',
        'status' => 'Active',
        'last_used' => '2025-07-28 11:30 AM',
        'description' => 'Automatically adjusts greetings and pronouns to be more respectful (e.g., "po/opo") when addressing elders in Filipino communications.',
        'config_details' => '{"target_audience": "elders", "keywords": ["you", "sir", "maam"], "replacement_logic": "add_po_opo"}'
    ],
    [
        'id' => 'CCA-002',
        'name' => 'Disaster Terminology Simplification (Rural)',
        'context' => 'Rural Communities',
        'adjustment_type' => 'Clarity/Simplicity',
        'status' => 'Active',
        'last_used' => '2025-07-28 10:00 AM',
        'description' => 'Simplifies complex disaster-related terminology into easily understandable terms for rural communities with varying literacy levels.',
        'config_details' => '{"target_audience": "rural", "vocabulary_level": "basic", "jargon_list": ["mitigation", "resilience"]}'
    ],
    [
        'id' => 'CCA-003',
        'name' => 'Emergency Contact Protocol (Indigenous)',
        'context' => 'Indigenous Communities',
        'adjustment_type' => 'Communication Protocol',
        'status' => 'Inactive',
        'last_used' => 'N/A',
        'description' => 'Ensures emergency contacts and messages follow specific cultural protocols for indigenous communities, respecting traditional communication channels.',
        'config_details' => '{"protocol_type": "traditional_leaders", "preferred_channel": "community_radio"}'
    ],
    [
        'id' => 'CCA-004',
        'name' => 'Tone Adjustment for Sensitive Topics',
        'context' => 'Sensitive Topics (e.g., Casualties)',
        'adjustment_type' => 'Tone/Empathy',
        'status' => 'Active',
        'last_used' => '2025-07-27 04:00 PM',
        'description' => 'Adjusts the tone of messages related to sensitive topics to convey empathy and avoid distress.',
        'config_details' => '{"sensitivity_level": "high", "avoid_phrases": ["casualty count"], "prefer_phrases": ["affected individuals"]}'
    ]
];

// Sample options for dropdowns
$contexts = ['All', 'Filipino Language', 'Rural Communities', 'Indigenous Communities', 'Sensitive Topics (e.g., Casualties)', 'Other'];
$adjustmentTypes = ['All', 'Tone/Formality', 'Clarity/Simplicity', 'Communication Protocol', 'Tone/Empathy', 'Other'];
$ruleStatuses = ['All', 'Active', 'Inactive'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Cultural Context Adjuster</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Adapt Communications for Cultural Sensitivity</h2>
        <p class="text-gray-700 leading-relaxed">
            The Cultural Context Adjuster module allows administrators to define rules for automatically adapting communication content to be culturally appropriate and sensitive for diverse recipient groups. This ensures messages are not only understood but also received respectfully and effectively across different cultural backgrounds.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Configured Cultural Adjustment Rules</h2>

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
                    <label for="filterContext" class="block text-sm font-medium text-gray-700">Filter by Context:</label>
                    <select id="filterContext" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($contexts as $context) : ?>
                            <option value="<?php echo htmlspecialchars($context); ?>"><?php echo htmlspecialchars($context); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterAdjustmentType" class="block text-sm font-medium text-gray-700">Filter by Adjustment Type:</label>
                    <select id="filterAdjustmentType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($adjustmentTypes as $type) : ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button onclick="openConfigModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Context</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Adjustment Type</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Last Used</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="ruleTableBody">
                    <!-- Rules will be rendered here by JavaScript -->
                    <?php if (empty($culturalRules)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No cultural adjustment rules configured.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals -->
    <!-- Rule Configuration Modal (Add/Edit) -->
    <div id="configModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4" id="configModalTitle">Add New Cultural Adjustment Rule</h3>
            <form id="configForm" onsubmit="return saveRule(event)">
                <input type="hidden" id="ruleId">
                <div class="mb-4">
                    <label for="ruleName" class="block text-sm font-medium text-gray-700">Rule Name</label>
                    <input type="text" id="ruleName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="context" class="block text-sm font-medium text-gray-700">Cultural Context</label>
                    <select id="context" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach (array_slice($contexts, 1) as $context) : // Exclude 'All' ?>
                            <option value="<?php echo htmlspecialchars($context); ?>"><?php echo htmlspecialchars($context); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="adjustmentType" class="block text-sm font-medium text-gray-700">Adjustment Type</label>
                    <select id="adjustmentType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <?php foreach (array_slice($adjustmentTypes, 1) as $type) : // Exclude 'All' ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="ruleDescription" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                    <textarea id="ruleDescription" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Brief description of this cultural adjustment rule"></textarea>
                </div>
                <div class="mb-4">
                    <label for="configDetails" class="block text-sm font-medium text-gray-700">Configuration Details (JSON/Text)</label>
                    <textarea id="configDetails" rows="5" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm font-mono" placeholder='e.g., {"keywords": ["formal"], "replacement": "po"}'></textarea>
                    <p class="mt-1 text-xs text-gray-500">Provide rule-specific configuration in JSON or plain text format.</p>
                </div>
                <div class="mb-4">
                    <label for="ruleStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="ruleStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeConfigModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
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
    <div id="detailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Cultural Adjustment Rule Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>ID:</strong> <span id="modalRuleId"></span></p>
                <p><strong>Name:</strong> <span id="modalRuleName"></span></p>
                <p><strong>Context:</strong> <span id="modalContext"></span></p>
                <p><strong>Adjustment Type:</strong> <span id="modalAdjustmentType"></span></p>
                <p><strong>Status:</strong> <span id="modalRuleStatus"></span></p>
                <p><strong>Last Used:</strong> <span id="modalLastUsed"></span></p>
                <p><strong>Description:</strong></p>
                <div id="modalRuleDescription" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
                <p><strong>Configuration Details:</strong></p>
                <pre id="modalConfigDetails" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[120px] overflow-auto text-sm font-mono"></pre>
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
    // Initial cultural rules data from PHP
    let culturalRulesData = <?php echo json_encode($culturalRules); ?>;

    // Get references to DOM elements
    const ruleTableBody = document.getElementById('ruleTableBody');
    const filterStatusSelect = document.getElementById('filterStatus');
    const filterContextSelect = document.getElementById('filterContext');
    const filterAdjustmentTypeSelect = document.getElementById('filterAdjustmentType');

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
     * Renders the cultural adjustment rules table based on the provided data.
     * @param {Array} dataToRender - The array of rule objects to display.
     */
    function renderRuleTable(dataToRender) {
        ruleTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="7" class="px-6 py-4 text-center text-gray-500">No cultural adjustment rules configured.</td>`;
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
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${rule.context}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${rule.adjustment_type}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${rule.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${rule.last_used || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewDetails('${encodeURIComponent(JSON.stringify(rule))}')" class="text-indigo-600 hover:text-indigo-900 mr-4">View</button>
                    <button onclick="openConfigModal('edit', '${encodeURIComponent(JSON.stringify(rule))}')" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                    <button onclick="testRule('${rule.id}')" class="text-yellow-600 hover:text-yellow-900 mr-4">Test</button>
                    <button onclick="deleteRule('${rule.id}')" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            `;
            ruleTableBody.appendChild(row);
        });
    }

    /**
     * Filters the cultural rules data based on selected criteria and re-renders the table.
     */
    function filterRules() {
        const selectedStatus = filterStatusSelect.value;
        const selectedContext = filterContextSelect.value;
        const selectedAdjustmentType = filterAdjustmentTypeSelect.value;

        const filteredData = culturalRulesData.filter(rule => {
            const matchesStatus = selectedStatus === 'All' || rule.status === selectedStatus;
            const matchesContext = selectedContext === 'All' || rule.context === selectedContext;
            const matchesAdjustmentType = selectedAdjustmentType === 'All' || rule.adjustment_type === selectedAdjustmentType;
            return matchesStatus && matchesContext && matchesAdjustmentType;
        });

        renderRuleTable(filteredData);
    }

    // Event listeners for filter changes
    filterStatusSelect.addEventListener('change', filterRules);
    filterContextSelect.addEventListener('change', filterRules);
    filterAdjustmentTypeSelect.addEventListener('change', filterRules);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderRuleTable(culturalRulesData);

        // Get elements for Rule Config Modal
        const configModal = document.getElementById('configModal');
        const configModalTitle = document.getElementById('configModalTitle');
        const ruleIdField = document.getElementById('ruleId');
        const ruleNameField = document.getElementById('ruleName');
        const contextField = document.getElementById('context');
        const adjustmentTypeField = document.getElementById('adjustmentType');
        const ruleDescriptionField = document.getElementById('ruleDescription');
        const configDetailsField = document.getElementById('configDetails');
        const ruleStatusField = document.getElementById('ruleStatus');

        /**
         * Opens the rule configuration modal for adding new or editing existing rules.
         * @param {string} mode - 'new' or 'edit'.
         * @param {string} [ruleJson=null] - JSON string of the rule data if in 'edit' mode.
         */
        window.openConfigModal = function(mode, ruleJson = null) {
            configModal.classList.remove('hidden');
            if (mode === 'new') {
                configModalTitle.textContent = 'Add New Cultural Adjustment Rule';
                ruleIdField.value = '';
                ruleNameField.value = '';
                contextField.value = 'Filipino Language'; // Default
                adjustmentTypeField.value = 'Tone/Formality'; // Default
                ruleDescriptionField.value = '';
                configDetailsField.value = '';
                ruleStatusField.value = 'Active';
            } else if (mode === 'edit' && ruleJson) {
                const rule = JSON.parse(decodeURIComponent(ruleJson));
                configModalTitle.textContent = 'Edit Cultural Adjustment Rule';
                ruleIdField.value = rule.id;
                ruleNameField.value = rule.name;
                contextField.value = rule.context;
                adjustmentTypeField.value = rule.adjustment_type;
                ruleDescriptionField.value = rule.description;
                configDetailsField.value = rule.config_details;
                ruleStatusField.value = rule.status;
            }
        };

        /**
         * Closes the rule configuration modal.
         */
        window.closeConfigModal = function() {
            configModal.classList.add('hidden');
        };

        /**
         * Handles saving (adding or updating) a cultural adjustment rule.
         * @param {Event} event - The form submission event.
         */
        window.saveRule = function(event) {
            event.preventDefault(); // Prevent default form submission

            const id = ruleIdField.value;
            const name = ruleNameField.value.trim();
            const context = contextField.value;
            const adjustment_type = adjustmentTypeField.value;
            const description = ruleDescriptionField.value.trim();
            const config_details = configDetailsField.value.trim();
            const status = ruleStatusField.value;

            if (!name || !context || !adjustment_type) {
                showAlert('Please fill in all required fields (Rule Name, Context, Adjustment Type).', 'Input Error');
                return false;
            }

            const now = new Date();
            const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;

            const newRule = {
                id: id || 'CCA-' + (culturalRulesData.length + 1).toString().padStart(3, '0'), // Simple ID generation
                name: name,
                context: context,
                adjustment_type: adjustment_type,
                status: status,
                last_used: timestamp,
                description: description,
                config_details: config_details
            };

            if (id) {
                // Update existing
                const index = culturalRulesData.findIndex(rule => rule.id === id);
                if (index !== -1) {
                    // Preserve last_used if not explicitly changed
                    newRule.last_used = culturalRulesData[index].last_used;
                    culturalRulesData[index] = newRule;
                    showAlert(`Cultural Adjustment Rule "${name}" updated successfully!`, 'Success');
                }
            } else {
                // Add new
                culturalRulesData.push(newRule);
                showAlert(`Cultural Adjustment Rule "${name}" added successfully!`, 'Success');
            }

            closeConfigModal();
            filterRules(); // Re-render table with updated data
            return false; // Prevent actual form submission
        };

        /**
         * Opens the rule details modal with the given rule's data.
         * @param {string} ruleJson - JSON string of the rule entry.
         */
        window.viewDetails = function(ruleJson) {
            const rule = JSON.parse(decodeURIComponent(ruleJson));
            document.getElementById('modalRuleId').textContent = rule.id;
            document.getElementById('modalRuleName').textContent = rule.name;
            document.getElementById('modalContext').textContent = rule.context;
            document.getElementById('modalAdjustmentType').textContent = rule.adjustment_type;
            document.getElementById('modalRuleStatus').textContent = rule.status;
            document.getElementById('modalLastUsed').textContent = rule.last_used || 'N/A';
            document.getElementById('modalRuleDescription').textContent = rule.description || 'No description provided.';
            document.getElementById('modalConfigDetails').textContent = rule.config_details ? JSON.stringify(JSON.parse(rule.config_details), null, 2) : 'No specific configuration.';

            document.getElementById('detailsModal').classList.remove('hidden');
        };

        // Close rule details modal
        document.getElementById('closeDetailsModal').addEventListener('click', function() {
            document.getElementById('detailsModal').classList.add('hidden');
        });

        /**
         * Simulates testing a cultural adjustment rule.
         * In a real app, this would involve applying the rule to sample content and showing the adjusted output.
         * @param {string} id - The ID of the rule to test.
         */
        window.testRule = function(id) {
            showConfirm(`Are you sure you want to test cultural adjustment rule ${id}? This will simulate content adaptation.`, (confirmed) => {
                if (confirmed) {
                    showAlert(`Simulating test for rule ${id}... (Check console for simulated adjustment)`, 'Testing Rule');
                    const index = culturalRulesData.findIndex(rule => rule.id === id);
                    if (index !== -1) {
                        // Simulate rule application success/failure
                        const isSuccess = Math.random() > 0.15; // 85% chance of success
                        const now = new Date();
                        const timestamp = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;
                        culturalRulesData[index].last_used = timestamp;

                        if (isSuccess) {
                            console.log(`Rule ${id} Test Result: SUCCESS! Sample content adjusted.`);
                            console.log(`Original: "Hello, sir. We need to evacuate."`);
                            console.log(`Adjusted: "Magandang araw po. Kailangan na po nating lumikas." (for Filipino Formal Address)`);
                            showAlert(`Rule ${id} tested successfully!`, 'Test Result');
                        } else {
                            console.error(`Rule ${id} Test Result: FAILED! Error: "Adjustment logic failed or context mismatch."`);
                            showAlert(`Rule ${id} test failed! Check configuration.`, 'Test Result (Failed)');
                        }
                        filterRules(); // Re-render table to show updated last_used timestamp
                    }
                }
            }, 'Test Cultural Adjustment Rule');
        };

        /**
         * Deletes a cultural adjustment rule.
         * @param {string} id - The ID of the rule to delete.
         */
        window.deleteRule = function(id) {
            showConfirm(`Are you sure you want to delete cultural adjustment rule ${id}? This action cannot be undone.`, (confirmed) => {
                if (confirmed) {
                    culturalRulesData = culturalRulesData.filter(rule => rule.id !== id);
                    showAlert(`Cultural adjustment rule ${id} deleted successfully.`, 'Rule Deleted');
                    filterRules(); // Re-render table
                }
            }, 'Delete Cultural Adjustment Rule');
        };
    });
</script>
