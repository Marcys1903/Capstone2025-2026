<?php
// Section Start: PHP Logic
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = "";
$pendingIncidents = [
    [
        'id' => 'INC-001',
        'type' => 'Fire Alarm',
        'location' => 'Building A, 3rd Floor',
        'time' => '2025-07-26 14:00',
        'source' => 'Automated Sensor',
        'message_content' => 'Smoke detected near server room in Building A, 3rd Floor. Automated fire alarm triggered. Requires immediate investigation.',
        'suggested_type' => 'Fire Incident',
        'suggested_severity' => 'Severe',
        'suggested_template' => 'Fire Incident Alert Template v2.1',
        'channels' => ['SMS', 'Email', 'PA System'],
        'target_groups' => ['Building A Occupants', 'Emergency Response Team', 'Maintenance Team'],
        'status' => 'Pending'
    ],
    [
        'id' => 'INC-002',
        'type' => 'Citizen Report',
        'location' => 'Main Gate Area',
        'time' => '2025-07-26 13:30',
        'source' => 'Public Reporting Module',
        'message_content' => 'A strange, unidentified van has been parked near the main gate for over an hour. Driver seems suspicious.',
        'suggested_type' => 'Security Threat',
        'suggested_severity' => 'Moderate',
        'suggested_template' => 'Security Alert - Suspicious Activity Template',
        'channels' => ['SMS', 'Email'],
        'target_groups' => ['Security Personnel', 'Admin Staff'],
        'status' => 'Pending'
    ],
    [
        'id' => 'INC-003',
        'type' => 'Medical Emergency',
        'location' => 'Cafeteria',
        'time' => '2025-07-26 12:45',
        'source' => 'Student Report',
        'message_content' => 'Student collapsed in cafeteria, possibly seizure. Needs immediate medical attention.',
        'suggested_type' => 'Health Emergency',
        'suggested_severity' => 'Critical',
        '' => 'Medical Emergency Broadcast',
        'channels' => ['SMS', 'PA System'],
        'target_groups' => ['Medical Team', 'First Responders', 'Cafeteria Staff'],
        'status' => 'Pending'
    ],
    [
        'id' => 'INC-004',
        'type' => 'System Alert',
        'location' => 'West Wing, Sections G-H',
        'time' => '2025-07-26 11:00',
        'source' => 'Internal Monitoring System',
        'message_content' => 'Partial power outage detected in West Wing, sections G-H. Investigation required.',
        'suggested_type' => 'General Warning',
        'suggested_severity' => 'Mild',
        'suggested_template' => 'Utility Disruption Advisory',
        'channels' => ['Email'],
        'target_groups' => ['West Wing Occupants', 'Maintenance Team'],
        'status' => 'Pending'
    ],
];
// Section End: PHP Logic
?>
<div class=" text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Incident Validation Interface</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Manual Review & Confirmation of Alerts</h2>
        <p class="text-gray-700 leading-relaxed">
            Review and confirm incoming incident reports before converting them into official alerts. This crucial step ensures accuracy, prevents false alarms, and maintains the credibility of the emergency communication system.
        </p>
    </section>
    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Pending Incidents for Validation</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Incident ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Event Type (Suggested)</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Severity (Suggested)</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Location</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Time Reported</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Source</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($pendingIncidents)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No pending incidents for validation.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($pendingIncidents as $incident) : ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($incident['id']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($incident['suggested_type']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($incident['suggested_severity']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($incident['location']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($incident['time']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($incident['source']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button onclick="openIncidentDetailsModal('<?php echo htmlspecialchars($incident['id']); ?>')" class="text-blue-600 hover:text-blue-900 mr-4">Review</button>
                                    <button onclick="approveIncident('<?php echo htmlspecialchars($incident['id']); ?>')" class="text-green-600 hover:text-green-900 mr-4">Approve</button>
                                    <button onclick="rejectIncident('<?php echo htmlspecialchars($incident['id']); ?>')" class="text-red-600 hover:text-red-900">Reject</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<div id="incidentDetailsModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="incident-modal-title">
                            Incident Details: <span id="detail-incident-id"></span>
                        </h3>
                        <div class="mt-2 space-y-3 text-sm text-gray-700">
                            <p><strong>Type:</strong> <span id="detail-incident-type"></span></p>
                            <p><strong>Location:</strong> <span id="detail-incident-location"></span></p>
                            <p><strong>Time Reported:</strong> <span id="detail-incident-time"></span></p>
                            <p><strong>Source:</strong> <span id="detail-incident-source"></span></p>
                            <p><strong>Message:</strong> <span id="detail-incident-message"></span></p>
                            <p class="pt-2"><strong>AI Suggested Type:</strong> <span id="detail-suggested-type" class="font-semibold text-blue-700"></span></p>
                            <p><strong>AI Suggested Severity:</strong> <span id="detail-suggested-severity" class="font-semibold text-orange-700"></span></p>
                            <p><strong>AI Suggested Template:</strong> <span id="detail-suggested-template" class="font-semibold text-green-700"></span></p>
                            <p><strong>Target Channels:</strong> <span id="detail-target-channels"></span></p>
                            <p><strong>Target Groups:</strong> <span id="detail-target-groups"></span></p>

                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <label for="manual_event_type" class="block text-sm font-medium text-gray-700">Manual Event Type</label>
                                <select id="manual_event_type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                    <option value="">-- Select Event Type --</option>
                                    <option value="Fire Incident">Fire Incident</option>
                                    <option value="Security Threat">Security Threat</option>
                                    <option value="Health Emergency">Health Emergency</option>
                                    <option value="Weather Alert">Weather Alert</option>
                                    <option value="General Warning">General Warning</option>
                                </select>
                            </div>
                            <div>
                                <label for="manual_severity" class="block text-sm font-medium text-gray-700">Manual Severity</label>
                                <select id="manual_severity" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                    <option value="">-- Select Severity --</option>
                                    <option value="Critical">Critical</option>
                                    <option value="Severe">Severe</option>
                                    <option value="Moderate">Moderate</option>
                                    <option value="Mild">Mild</option>
                                    <option value="Informational">Informational</option>
                                </select>
                            </div>
                            <div>
                                <label for="manual_template" class="block text-sm font-medium text-gray-700">Manual Template</label>
                                <select id="manual_template" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                    <option value="">-- Select Template --</option>
                                    <option value="Fire Incident Alert Template v2.1">Fire Incident Alert Template v2.1</option>
                                    <option value="Security Alert - Suspicious Activity Template">Security Alert - Suspicious Activity Template</option>
                                    <option value="Medical Emergency Broadcast">Medical Emergency Broadcast</option>
                                    <option value="Utility Disruption Advisory">Utility Disruption Advisory</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" id="confirmIncidentBtn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Confirm & Generate Alert
                </button>
                <button type="button" onclick="closeIncidentDetailsModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    const pendingIncidents = <?php echo json_encode($pendingIncidents); ?>;

    function openIncidentDetailsModal(incidentId) {
        const incident = pendingIncidents.find(inc => inc.id === incidentId);
        if (incident) {
            document.getElementById('detail-incident-id').innerText = incident.id;
            document.getElementById('detail-incident-type').innerText = incident.type;
            document.getElementById('detail-incident-location').innerText = incident.location;
            document.getElementById('detail-incident-time').innerText = incident.time;
            document.getElementById('detail-incident-source').innerText = incident.source;
            document.getElementById('detail-incident-message').innerText = incident.message_content;
            document.getElementById('detail-suggested-type').innerText = incident.suggested_type;
            document.getElementById('detail-suggested-severity').innerText = incident.suggested_severity;
            document.getElementById('detail-suggested-template').innerText = incident.suggested_template;
            document.getElementById('detail-target-channels').innerText = incident.channels.join(', ');
            document.getElementById('detail-target-groups').innerText = incident.target_groups.join(', ');

            document.getElementById('manual_event_type').value = incident.suggested_type;
            document.getElementById('manual_severity').value = incident.suggested_severity;
            document.getElementById('manual_template').value = incident.suggested_template;

            document.getElementById('incidentDetailsModal').classList.remove('hidden');
        }
    }

    function closeIncidentDetailsModal() {
        document.getElementById('incidentDetailsModal').classList.add('hidden');
    }

    function approveIncident(incidentId) {
        alert(`Incident ${incidentId} approved! Generating alert...`);
        location.reload();
    }

    function rejectIncident(incidentId) {
        if (confirm(`Are you sure you want to reject incident ${incidentId}?`)) {
            alert(`Incident ${incidentId} rejected.`);
            location.reload();
        }
    }

    document.getElementById('confirmIncidentBtn').addEventListener('click', function() {
        const incidentId = document.getElementById('detail-incident-id').innerText;
        const manualEventType = document.getElementById('manual_event_type').value;
        const manualSeverity = document.getElementById('manual_severity').value;
        const manualTemplate = document.getElementById('manual_template').value;

        alert(`Incident ${incidentId} confirmed with:\nEvent Type: ${manualEventType}\nSeverity: ${manualSeverity}\nTemplate: ${manualTemplate}\nGenerating alert...`);
        closeIncidentDetailsModal();
        location.reload();
    });
</script>