<?php
// Section Start: PHP Logic
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = "";
$severityLevels = [
    ['id' => 'SL-001', 'level' => 'Critical', 'description' => 'Requires immediate attention; poses extreme risk.', 'impact' => 'High', 'color_class' => 'text-red-600', 'bg_color_class' => 'bg-red-100', 'border_color_class' => 'border-red-400'],
    ['id' => 'SL-002', 'level' => 'Severe', 'description' => 'Potentially harmful threat to safety or property.', 'impact' => 'Medium-High', 'color_class' => 'text-orange-600', 'bg_color_class' => 'bg-orange-100', 'border_color_class' => 'border-orange-400'],
    ['id' => 'SL-003', 'level' => 'Moderate', 'description' => 'Moderate impact; attention required within a few hours.', 'impact' => 'Medium', 'color_class' => 'text-yellow-600', 'bg_color_class' => 'bg-yellow-100', 'border_color_class' => 'border-yellow-400'],
    ['id' => 'SL-004', 'level' => 'Mild', 'description' => 'Non-critical advisory or information.', 'impact' => 'Low', 'color_class' => 'text-green-600', 'bg_color_class' => 'bg-green-100', 'border_color_class' => 'border-green-400'],
    ['id' => 'SL-005', 'level' => 'Informational', 'description' => 'No immediate threat; for awareness only.', 'impact' => 'None', 'color_class' => 'text-blue-600', 'bg_color_class' => 'bg-blue-100', 'border_color_class' => 'border-blue-400'],
];
// Section End: PHP Logic
?>
<div class=" text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Severity Level Assigner</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Assign Incident Severity</h2>
        <p class="text-gray-700 leading-relaxed mb-6">
            Input an incident description to get an AI-suggested severity level, or manually set it based on your assessment.
        </p>

        <div class="space-y-4">
            <div>
                <label for="incident_description" class="block text-sm font-medium text-gray-700">Incident Description</label>
                <textarea id="incident_description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., Reports of structural damage to the bridge near the river due to recent tremors."></textarea>
            </div>
            <div class="text-right">
                <button id="assign_severity_button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.414-1.414L11 9.586V6z" clip-rule="evenodd"></path></svg>
                    Assign Severity
                </button>
            </div>

            <div id="severity_results" class="hidden bg-gray-50 p-4 rounded-md border border-gray-200">
                <h3 class="text-lg font-medium text-gray-800 mb-2">Suggested Severity:</h3>
                <p class="text-gray-700"><strong>Level:</strong> <span id="suggested_level" class="font-semibold text-blue-700"></span></p>
                <p class="text-gray-700"><strong>Impact:</strong> <span id="suggested_impact" class="font-semibold text-blue-700"></span></p>

                <div class="mt-4">
                    <label for="manual_severity_override" class="block text-sm font-medium text-gray-700">Manual Override (if needed)</label>
                    <select id="manual_severity_override" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option value="">-- Select to Override --</option>
                        <?php foreach ($severityLevels as $level) : ?>
                            <option value="<?php echo htmlspecialchars($level['id']); ?>"><?php echo htmlspecialchars($level['level']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mt-4 text-right">
                    <button id="confirm_severity" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        Confirm Severity
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Manage Severity Levels</h2>
        <p class="text-gray-700 leading-relaxed mb-6">
            Define, update, or remove severity levels to accurately categorize incidents by their potential impact.
        </p>

        <div class="mb-6 text-right">
            <button onclick="openSeverityModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Add New Level
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Level</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Impact</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($severityLevels)) : ?>
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No severity levels defined.</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($severityLevels as $level) : ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($level['id']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($level['level']); ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900"><?php echo htmlspecialchars($level['description']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($level['impact']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button onclick="openSeverityModal('edit', '<?php echo htmlspecialchars($level['id']); ?>')" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                                    <button onclick="deleteSeverity('<?php echo htmlspecialchars($level['id']); ?>')" class="text-red-600 hover:text-red-900">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<div id="severityModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="severity-modal-title">
                            Manage Severity Level
                        </h3>
                        <div class="mt-2">
                            <form class="space-y-4">
                                <div>
                                    <label for="severityId" class="block text-sm font-medium text-gray-700">Severity ID</label>
                                    <input type="text" id="severityId" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" readonly>
                                </div>
                                <div>
                                    <label for="severityLevel" class="block text-sm font-medium text-gray-700">Level Name</label>
                                    <input type="text" id="severityLevel" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                                </div>
                                <div>
                                    <label for="severityDescription" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea id="severityDescription" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
                                </div>
                                <div>
                                    <label for="severityImpact" class="block text-sm font-medium text-gray-700">Impact</label>
                                    <input type="text" id="severityImpact" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" id="saveSeverityBtn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Save
                </button>
                <button type="button" onclick="closeSeverityModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function assignSeverity() {
        document.getElementById('suggested_level').innerText = 'Severe';
        document.getElementById('suggested_impact').innerText = 'High';
        document.getElementById('severity_results').classList.remove('hidden');
    }

    function confirmSeverity() {
        alert('Severity confirmed!');
        document.getElementById('severity_results').classList.add('hidden');
        document.getElementById('incident_description').value = '';
        document.getElementById('manual_severity_override').value = '';
    }

    let currentSeverityId = null;

    function openSeverityModal(mode, id = null) {
        currentSeverityId = id;
        const modal = document.getElementById('severityModal');
        const modalTitle = document.getElementById('severity-modal-title');
        const severityIdField = document.getElementById('severityId');
        const severityLevelField = document.getElementById('severityLevel');
        const severityDescriptionField = document.getElementById('severityDescription');
        const severityImpactField = document.getElementById('severityImpact');

        if (mode === 'new') {
            modalTitle.innerText = 'Add New Severity Level';
            severityIdField.value = 'SL-' + Math.floor(Math.random() * 1000).toString().padStart(3, '0');
            severityLevelField.value = '';
            severityDescriptionField.value = '';
            severityImpactField.value = '';
            severityIdField.readOnly = true;
        } else if (mode === 'edit' && id) {
            modalTitle.innerText = 'Edit Severity Level';
            severityIdField.readOnly = true;
            const severity = <?php echo json_encode($severityLevels); ?>.find(s => s.id === id);
            if (severity) {
                severityIdField.value = severity.id;
                severityLevelField.value = severity.level;
                severityDescriptionField.value = severity.description;
                severityImpactField.value = severity.impact;
            }
        }
        modal.classList.remove('hidden');
    }

    function closeSeverityModal() {
        document.getElementById('severityModal').classList.add('hidden');
    }

    function saveSeverity() {
        const id = document.getElementById('severityId').value;
        const level = document.getElementById('severityLevel').value;
        const description = document.getElementById('severityDescription').value;
        const impact = document.getElementById('severityImpact').value;

        alert(`Saving Severity Level:\nID: ${id}\nLevel: ${level}\nDescription: ${description}\nImpact: ${impact}`);
        closeSeverityModal();
        location.reload();
    }

    function deleteSeverity(id) {
        if (confirm(`Are you sure you want to delete severity level ${id}?`)) {
            alert(`Deleting severity level ${id}`);
            location.reload();
        }
    }

    document.getElementById('assign_severity_button').addEventListener('click', assignSeverity);
    document.getElementById('confirm_severity').addEventListener('click', confirmSeverity);
    document.getElementById('saveSeverityBtn').addEventListener('click', saveSeverity);
</script>