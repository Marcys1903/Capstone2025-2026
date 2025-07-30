<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for audit reports.
// In a real application, this data would be fetched from a database or generated dynamically.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample audit report data (simulated previously generated reports)
$auditReports = [
    [
        'report_id' => 'AUD-001',
        'generated_by' => 'Admin Marcus',
        'report_type' => 'User Activity Log',
        'start_date' => '2025-07-01',
        'end_date' => '2025-07-28',
        'generation_date' => '2025-07-28 09:30 AM',
        'status' => 'Completed',
        'description' => 'Comprehensive log of all user logins, logouts, and actions within the specified period.',
        'download_link' => '#', // Placeholder for actual download link
    ],
    [
        'report_id' => 'AUD-002',
        'generated_by' => 'Admin Jane',
        'report_type' => 'System Configuration Changes',
        'start_date' => '2025-07-15',
        'end_date' => '2025-07-28',
        'generation_date' => '2025-07-28 10:15 AM',
        'status' => 'Completed',
        'description' => 'Report detailing all changes made to system configurations, including timestamps and administrators responsible.',
        'download_link' => '#',
    ],
    [
        'report_id' => 'AUD-003',
        'generated_by' => 'Admin Marcus',
        'report_type' => 'Alert History Summary',
        'start_date' => '2025-07-20',
        'end_date' => '2025-07-27',
        'generation_date' => '2025-07-27 03:00 PM',
        'status' => 'Failed',
        'description' => 'Summary of all alerts triggered, their status, and resolution details. Failed due to data integrity issues.',
        'download_link' => '', // No download link if failed
    ],
    [
        'report_id' => 'AUD-004',
        'generated_by' => 'System',
        'report_type' => 'Database Backup Log',
        'start_date' => '2025-07-01',
        'end_date' => '2025-07-28',
        'generation_date' => '2025-07-28 01:00 AM',
        'status' => 'Completed',
        'description' => 'Automated report on database backup operations and their success status.',
        'download_link' => '#',
    ],
];

// Sample options for dropdowns for report generation
$reportTypes = ['User Activity Log', 'System Configuration Changes', 'Alert History Summary', 'Geofence Audit', 'Channel Usage Report', 'Database Backup Log'];
$adminUsers = ['All', 'Admin Marcus', 'Admin Jane', 'System'];
$reportStatuses = ['All', 'Completed', 'Processing', 'Failed'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Audit Report Generator</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Generate Comprehensive Audit Reports</h2>
        <p class="text-gray-700 leading-relaxed">
            The Audit Report Generator allows administrators to create detailed reports on various system activities and configurations. These reports are crucial for compliance, security audits, and performance analysis, providing a clear, historical overview of system operations.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Report Generation Options</h2>

        <div class="mb-6 flex flex-wrap items-end gap-4">
            <!-- Filter Controls for Report Generation -->
            <div class="flex flex-wrap space-x-4 gap-y-2">
                <div>
                    <label for="reportStartDate" class="block text-sm font-medium text-gray-700">Start Date:</label>
                    <input type="date" id="reportStartDate" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="reportEndDate" class="block text-sm font-medium text-gray-700">End Date:</label>
                    <input type="date" id="reportEndDate" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="reportType" class="block text-sm font-medium text-gray-700">Report Type:</label>
                    <select id="reportType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($reportTypes as $type) : ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="generatedBy" class="block text-sm font-medium text-gray-700">Generated By:</label>
                    <select id="generatedBy" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($adminUsers as $admin) : ?>
                            <option value="<?php echo htmlspecialchars($admin); ?>"><?php echo htmlspecialchars($admin); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button id="generateReportBtn" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Generate Report
            </button>
        </div>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Recently Generated Reports</h2>

        <div class="mb-6 flex flex-wrap justify-between items-center gap-4">
            <!-- Filter for displayed reports -->
            <div class="flex flex-wrap space-x-4 gap-y-2">
                <div>
                    <label for="filterReportStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                    <select id="filterReportStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($reportStatuses as $status) : ?>
                            <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Report ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Report Type</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Generated By</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Period</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Generation Date</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="reportTableBody">
                    <!-- Reports will be rendered here by JavaScript -->
                    <?php if (empty($auditReports)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No audit reports generated yet.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals (re-used from adminactiontracker.php) -->
    <!-- Report Details Modal -->
    <div id="detailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Report Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>Report ID:</strong> <span id="modalReportId"></span></p>
                <p><strong>Report Type:</strong> <span id="modalReportType"></span></p>
                <p><strong>Generated By:</strong> <span id="modalGeneratedBy"></span></p>
                <p><strong>Period:</strong> <span id="modalReportPeriod"></span></p>
                <p><strong>Generation Date:</strong> <span id="modalGenerationDate"></span></p>
                <p><strong>Status:</strong> <span id="modalReportStatus"></span></p>
                <p><strong>Description:</strong></p>
                <div id="modalDescription" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
                <div id="modalDownloadLink" class="mt-4 hidden">
                    <a href="#" class="text-blue-600 hover:underline font-medium" target="_blank">Download Report</a>
                </div>
            </div>
            <div class="mt-6 text-right">
                <button id="closeDetailsModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Close
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
                <button id="alertCloseBtn" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                    OK
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
                <button id="confirmProceedBtn" class="px-4 py-2 text-sm font-medium text-blue-600 rounded-md hover:bg-blue-700">
                    Proceed
                </button>
            </div>
        </div>
    </div>

</div>

<script>
    // Initial audit reports data from PHP
    let auditReportsData = <?php echo json_encode($auditReports); ?>;

    // Get references to DOM elements for report generation
    const reportStartDateInput = document.getElementById('reportStartDate');
    const reportEndDateInput = document.getElementById('reportEndDate');
    const reportTypeSelect = document.getElementById('reportType');
    const generatedBySelect = document.getElementById('generatedBy');
    const generateReportBtn = document.getElementById('generateReportBtn');

    // Get references to DOM elements for recently generated reports table
    const reportTableBody = document.getElementById('reportTableBody');
    const filterReportStatusSelect = document.getElementById('filterReportStatus');

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
     * Renders the audit report table based on the provided data.
     * @param {Array} dataToRender - The array of report objects to display.
     */
    function renderReportTable(dataToRender) {
        reportTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="7" class="px-6 py-4 text-center text-gray-500">No audit reports found matching filters.</td>`;
            reportTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(report => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (report.status === 'Completed') statusClass = 'bg-green-100 text-green-800';
            else if (report.status === 'Failed') statusClass = 'bg-red-100 text-red-800';
            else if (report.status === 'Processing') statusClass = 'bg-yellow-100 text-yellow-800';
            else statusClass = 'bg-gray-100 text-gray-800'; // Default

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${report.report_id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${report.report_type}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${report.generated_by}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${report.start_date} to ${report.end_date}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${report.generation_date || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${report.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewReportDetails('${encodeURIComponent(JSON.stringify(report))}')" class="text-indigo-600 hover:text-indigo-900">View Details</button>
                </td>
            `;
            reportTableBody.appendChild(row);
        });
    }

    /**
     * Filters the audit report data based on selected criteria and re-renders the table.
     */
    function filterReports() {
        const selectedStatus = filterReportStatusSelect.value;

        const filteredData = auditReportsData.filter(report => {
            const matchesStatus = selectedStatus === 'All' || report.status === selectedStatus;
            return matchesStatus;
        });

        renderReportTable(filteredData);
    }

    /**
     * Simulates the generation of a new audit report.
     */
    function generateReport() {
        const startDate = reportStartDateInput.value;
        const endDate = reportEndDateInput.value;
        const reportType = reportTypeSelect.value;
        const generatedBy = generatedBySelect.value;

        if (!startDate || !endDate) {
            showAlert('Please select both a start and end date for the report.', 'Missing Dates');
            return;
        }

        if (new Date(startDate) > new Date(endDate)) {
            showAlert('Start date cannot be after end date.', 'Invalid Date Range');
            return;
        }

        // Simulate report generation
        const newReportId = 'AUD-' + Math.floor(Math.random() * 1000).toString().padStart(3, '0');
        const newReport = {
            report_id: newReportId,
            generated_by: generatedBy === 'All' ? 'System' : generatedBy, // If 'All' is selected, default to 'System' for generation
            report_type: reportType,
            start_date: startDate,
            end_date: endDate,
            generation_date: new Date().toLocaleString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', hour12: true }),
            status: 'Processing', // Simulate processing status
            description: `Generated a new ${reportType} report for the period ${startDate} to ${endDate}.`,
            download_link: '', // No download link initially
        };

        // Add the new report to the beginning of the data array
        auditReportsData.unshift(newReport);
        filterReports(); // Re-render the table with the new report

        showAlert(`Report "${newReportId}" of type "${reportType}" is now processing.`, 'Report Generation Initiated');

        // Simulate report completion after a short delay
        setTimeout(() => {
            const index = auditReportsData.findIndex(r => r.report_id === newReportId);
            if (index !== -1) {
                auditReportsData[index].status = 'Completed';
                auditReportsData[index].download_link = `#download/${newReportId}`; // Simulate a download link
                filterReports(); // Re-render to show updated status
                showAlert(`Report "${newReportId}" has been completed and is ready for download.`, 'Report Completed');
            }
        }, 3000); // 3-second delay for simulation
    }

    // Event listener for generate report button
    generateReportBtn.addEventListener('click', generateReport);
    filterReportStatusSelect.addEventListener('change', filterReports);


    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderReportTable(auditReportsData);

        // Set default dates for convenience (e.g., last 30 days)
        const today = new Date();
        const thirtyDaysAgo = new Date();
        thirtyDaysAgo.setDate(today.getDate() - 30);

        reportEndDateInput.value = today.toISOString().split('T')[0];
        reportStartDateInput.value = thirtyDaysAgo.toISOString().split('T')[0];


        // Get elements for Report Details Modal
        const detailsModal = document.getElementById('detailsModal');
        const modalReportId = document.getElementById('modalReportId');
        const modalReportType = document.getElementById('modalReportType');
        const modalGeneratedBy = document.getElementById('modalGeneratedBy');
        const modalReportPeriod = document.getElementById('modalReportPeriod');
        const modalGenerationDate = document.getElementById('modalGenerationDate');
        const modalReportStatus = document.getElementById('modalReportStatus');
        const modalDescription = document.getElementById('modalDescription');
        const modalDownloadLink = document.getElementById('modalDownloadLink');
        const closeDetailsModal = document.getElementById('closeDetailsModal');

        /**
         * Opens the report details modal with the given report's data.
         * @param {string} reportJson - JSON string of the report entry.
         */
        window.viewReportDetails = function(reportJson) {
            const report = JSON.parse(decodeURIComponent(reportJson));
            modalReportId.textContent = report.report_id;
            modalReportType.textContent = report.report_type;
            modalGeneratedBy.textContent = report.generated_by;
            modalReportPeriod.textContent = `${report.start_date} to ${report.end_date}`;
            modalGenerationDate.textContent = report.generation_date || 'N/A';
            modalReportStatus.textContent = report.status;
            modalDescription.textContent = report.description || 'No detailed description provided.';

            if (report.download_link && report.status === 'Completed') {
                modalDownloadLink.classList.remove('hidden');
                modalDownloadLink.querySelector('a').href = report.download_link;
            } else {
                modalDownloadLink.classList.add('hidden');
            }

            detailsModal.classList.remove('hidden');
        };

        // Close report details modal
        closeDetailsModal.addEventListener('click', function() {
            detailsModal.classList.add('hidden');
        });
    });
</script>
