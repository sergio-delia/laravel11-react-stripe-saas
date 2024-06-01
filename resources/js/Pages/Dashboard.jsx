import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Dashboard({ auth, usedFeatures }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />
Test
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">






<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Feature
                </th>
                <th scope="col" class="px-6 py-3">
                    Credits
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Additional Data
                </th>
            </tr>
        </thead>
        <tbody>
            {usedFeatures.data.map((usedFeature)=>
            (
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" key={usedFeature.id}>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {usedFeature.feature.name}
                </th>
                <td class="px-6 py-4">
                    {usedFeature.credits}
                </td>
                <td class="px-6 py-4">
                    {usedFeature.created_at}
                </td>
                <td class="px-6 py-4">
                    {JSON.stringify(usedFeature.data)}
                </td>
            </tr>
            ))}
            {!usedFeatures.data.length && (
                <tr>
                    <td colSpan="4" className='text-center p-8'>
                        You have not used any features yet.
                    </td>
                </tr>
            )}
        </tbody>
    </table>
</div>






                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
