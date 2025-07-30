<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for incident reports.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample incident reports with enriched details for admin management
$incidentReports = [
    [
        'id' => 'INC-001',
        'type' => 'Flood',
        'location' => 'Barangay 1',
        'description' => 'Heavy flooding observed near the riverbanks. Water level rising rapidly, affecting residential areas.',
        'severity' => 'High',
        'status' => 'New',
        'reported_by' => 'Resident A',
        'contact' => '09123456789',
        'timestamp' => '2025-07-26 08:30 AM',
        'attachments_count' => 1,
        'assigned_to' => 'Unassigned'
    ],
    [
        'id' => 'INC-002',
        'type' => 'Medical Emergency',
        'location' => 'Commercial District',
        'description' => 'Elderly person collapsed near ABC Mall entrance. Needs immediate medical attention.',
        'severity' => 'Critical',
        'status' => 'Under Review',
        'reported_by' => 'Bystander B',
        'contact' => '09987654321',
        'timestamp' => '2025-07-26 09:00 AM',
        'attachments_count' => 0,
        'assigned_to' => 'Medical Team 1'
    ],
    [
        'id' => 'INC-003',
        'type' => 'Security Threat',
        'location' => 'Industrial Zone',
        'description' => 'Suspicious activity reported near warehouse. Unknown individuals attempting to breach perimeter.',
        'severity' => 'High',
        'status' => 'Resolved',
        'reported_by' => 'Security Guard C',
        'contact' => '09001112222',
        'timestamp' => '2025-07-25 05:15 PM',
        'attachments_count' => 2,
        'assigned_to' => 'Police Dept.'
    ],
    [
        'id' => 'INC-004',
        'type' => 'Earthquake',
        'location' => 'School Zone A',
        'description' => 'Minor tremors felt. No visible damage, but students are evacuated as a precaution.',
        'severity' => 'Low',
        'status' => 'New',
        'reported_by' => 'Teacher D',
        'contact' => '09334445555',
        'timestamp' => '2025-07-26 10:45 AM',
        'attachments_count' => 0,
        'assigned_to' => 'Unassigned'
    ]
];

// Sample types for filtering and new report submission
$incidentTypes = ['All', 'Fire', 'Flood', 'Earthquake', 'Security Threat', 'Medical Emergency', 'Other'];

// Sample locations for filtering and new report submission
$locations = ['All', 'Barangay 1', 'Barangay 2', 'Commercial District', 'Industrial Zone', 'School Zone A', 'Flood Zone C'];

// Sample statuses for filtering and updating
$incidentStatuses = ['All', 'New', 'Under Review', 'Resolved', 'Closed'];

// Sample severities for filtering
$incidentSeverities = ['All', 'Critical', 'High', 'Medium', 'Low'];

// Sample teams for assignment
$assignmentTeams = ['Unassigned', 'Medical Team 1', 'Police Dept.', 'Fire Dept.', 'Emergency Management Team'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Incident Reporting Module</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Manage and Review Incident Reports</h2>
        <p class="text-gray-700 leading-relaxed">
            This module provides administrators with a comprehensive overview and management tools for all incoming incident reports. It enables efficient tracking, status updates, and assignment of incidents to relevant response teams.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Incident Reports Overview</h2>

        <!-- Filter Controls -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div>
                <label for="filterType" class="block text-sm font-medium text-gray-700">Filter by Type:</label>
                <select id="filterType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                    <?php foreach ($incidentTypes as $type) : ?>
                        <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="filterLocation" class="block text-sm font-medium text-gray-700">Filter by Location:</label>
                <select id="filterLocation" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                    <?php foreach ($locations as $location) : ?>
                        <option value="<?php echo htmlspecialchars($location); ?>"><?php echo htmlspecialchars($location); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="filterStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                <select id="filterStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                    <?php foreach ($incidentStatuses as $status) : ?>
                        <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="filterSeverity" class="block text-sm font-medium text-gray-700">Filter by Severity:</label>
                <select id="filterSeverity" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                    <?php foreach ($incidentSeverities as $severity) : ?>
                        <option value="<?php echo htmlspecialchars($severity); ?>"><?php echo htmlspecialchars($severity); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Location</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Severity</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Reported By</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Timestamp</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Assigned To</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="incidentTableBody">
                    <!-- Incident reports will be rendered here by JavaScript -->
                    <?php if (empty($incidentReports)): ?>
                        <tr>
                            <td colspan="9" class="px-6 py-4 text-center text-gray-500">No incident reports found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals (re-using pattern from User Feedback Collector) -->
    <!-- Incident Details Modal -->
    <div id="incidentDetailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Incident Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>ID:</strong> <span id="modalIncidentId"></span></p>
                <p><strong>Type:</strong> <span id="modalIncidentType"></span></p>
                <p><strong>Location:</strong> <span id="modalIncidentLocation"></span></p>
                <p><strong>Severity:</strong> <span id="modalIncidentSeverity"></span></p>
                <p><strong>Status:</strong> <span id="modalIncidentStatus"></span></p>
                <p><strong>Reported By:</strong> <span id="modalReportedBy"></span></p>
                <p><strong>Contact:</strong> <span id="modalContact"></span></p>
                <p><strong>Timestamp:</strong> <span id="modalTimestamp"></span></p>
                <p><strong>Assigned To:</strong> <span id="modalAssignedTo"></span></p>
                <p><strong>Description:</strong></p>
                <div id="modalIncidentDescription" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[100px] overflow-y-auto"></div>
                <p><strong>Attachments:</strong> <span id="modalAttachmentsCount"></span></p>
            </div>
            <div class="mt-6 text-right">
                <button id="closeIncidentDetailsModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white text-center">
            <h3 class="text-lg font-bold mb-4" id="confirmationModalTitle">Confirm Action</h3>
            <p class="text-gray-700 mb-6" id="confirmationModalMessage"></p>
            <div class="flex justify-center space-x-4">
                <button id="confirmCancelBtn" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Cancel
                </button>
                <button id="confirmProceedBtn" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700">
                    Proceed
                </button>
            </div>
        </div>
    </div>

    <!-- Alert Message Modal -->
    <div id="alertModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white text-center">
            <h3 class="text-lg font-bold mb-4" id="alertModalTitle">Notification</h3>
            <p class="text-gray-700 mb-6" id="alertModalMessage"></p>
            <div class="flex justify-center">
                <button id="alertCloseBtn" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700">
                    OK
                </button>
            </div>
        </div>
    </div>

</div>

<script>
    // Initial incident reports data from PHP
    let incidentReportsData = <?php echo json_encode($incidentReports); ?>;

    // Get references to DOM elements
    const incidentTableBody = document.getElementById('incidentTableBody');
    const filterTypeSelect = document.getElementById('filterType');
    const filterLocationSelect = document.getElementById('filterLocation');
    const filterStatusSelect = document.getElementById('filterStatus');
    const filterSeveritySelect = document.getElementById('filterSeverity');

    // Custom Alert Modal elements
    const alertModal = document.getElementById('alertModal');
    const alertModalTitle = document.getElementById('alertModalTitle');
    const alertModalMessage = document.getElementById('alertModalMessage');
    const alertCloseBtn = document.getElementById('alertCloseBtn');

    // Custom Confirmation Modal elements
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
     * Renders the incident reports table based on the provided data.
     * @param {Array} dataToRender - The array of incident report objects to display.
     */
    function renderIncidentTable(dataToRender) {
        incidentTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="9" class="px-6 py-4 text-center text-gray-500">No incident reports found matching filters.</td>`;
            incidentTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(report => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (report.status === 'New') statusClass = 'bg-blue-100 text-blue-800';
            else if (report.status === 'Under Review') statusClass = 'bg-yellow-100 text-yellow-800';
            else if (report.status === 'Resolved') statusClass = 'bg-green-100 text-green-800';
            else if (report.status === 'Closed') statusClass = 'bg-gray-100 text-gray-800';
            else statusClass = 'bg-gray-100 text-gray-800'; // Default

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${report.id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${report.type}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${report.location}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${report.severity}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${report.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${report.reported_by}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${report.timestamp}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${report.assigned_to || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewIncident('${encodeURIComponent(JSON.stringify(report))}')" class="text-indigo-600 hover:text-indigo-900 mr-4">View</button>
                    <button onclick="updateIncidentStatus('${report.id}', 'Under Review')" class="text-blue-600 hover:text-blue-900 mr-4">Review</button>
                    <button onclick="updateIncidentStatus('${report.id}', 'Resolved')" class="text-green-600 hover:text-green-900">Resolve</button>
                </td>
            `;
            incidentTableBody.appendChild(row);
        });
    }

    /**
     * Filters the incident reports data based on selected criteria and re-renders the table.
     */
    function filterIncidents() {
        const selectedType = filterTypeSelect.value;
        const selectedLocation = filterLocationSelect.value;
        const selectedStatus = filterStatusSelect.value;
        const selectedSeverity = filterSeveritySelect.value;

        const filteredData = incidentReportsData.filter(report => {
            const matchesType = selectedType === 'All' || report.type === selectedType;
            const matchesLocation = selectedLocation === 'All' || report.location === selectedLocation;
            const matchesStatus = selectedStatus === 'All' || report.status === selectedStatus;
            const matchesSeverity = selectedSeverity === 'All' || report.severity === selectedSeverity;

            return matchesType && matchesLocation && matchesStatus && matchesSeverity;
        });

        renderIncidentTable(filteredData);
    }

    // Event listeners for filter changes
    filterTypeSelect.addEventListener('change', filterIncidents);
    filterLocationSelect.addEventListener('change', filterIncidents);
    filterStatusSelect.addEventListener('change', filterIncidents);
    filterSeveritySelect.addEventListener('change', filterIncidents);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderIncidentTable(incidentReportsData);

        /**
         * Opens the incident details modal with the given report's data.
         * @param {string} incidentJson - JSON string of the incident report entry.
         */
        window.viewIncident = function(incidentJson) {
            const incident = JSON.parse(decodeURIComponent(incidentJson));
            document.getElementById('modalIncidentId').textContent = incident.id;
            document.getElementById('modalIncidentType').textContent = incident.type;
            document.getElementById('modalIncidentLocation').textContent = incident.location;
            document.getElementById('modalIncidentSeverity').textContent = incident.severity;
            document.getElementById('modalIncidentStatus').textContent = incident.status;
            document.getElementById('modalReportedBy').textContent = incident.reported_by;
            document.getElementById('modalContact').textContent = incident.contact;
            document.getElementById('modalTimestamp').textContent = incident.timestamp;
            document.getElementById('modalAssignedTo').textContent = incident.assigned_to || 'N/A';
            document.getElementById('modalIncidentDescription').textContent = incident.description || 'No detailed description provided.';
            document.getElementById('modalAttachmentsCount').textContent = incident.attachments_count > 0 ? `${incident.attachments_count} file(s)` : 'None';

            document.getElementById('incidentDetailsModal').classList.remove('hidden');
        };

        // Close incident details modal
        document.getElementById('closeIncidentDetailsModal').addEventListener('click', function() {
            document.getElementById('incidentDetailsModal').classList.add('hidden');
        });

        /**
         * Updates the status of an incident report.
         * @param {string} id - The ID of the incident report.
         * @param {string} newStatus - The new status ('Under Review', 'Resolved', 'Closed').
         */
        window.updateIncidentStatus = function(id, newStatus) {
            showConfirm(`Are you sure you want to mark incident ${id} as ${newStatus}?`, (confirmed) => {
                if (confirmed) {
                    const index = incidentReportsData.findIndex(report => report.id === id);
                    if (index !== -1) {
                        incidentReportsData[index].status = newStatus;
                        showAlert(`Incident ${id} marked as ${newStatus}.`, 'Status Updated');
                        filterIncidents(); // Re-render table to reflect status change
                    }
                }
            }, 'Update Incident Status');
        };
    });
</script>
