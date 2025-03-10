
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';

// Define the props passed from the parent component (or route)
defineProps({
    buses: {
        type: Array,
        required: true
    }
});

// Create a form instance for booking a ticket
const form = useForm({
    ticket_id: null, // Placeholder for ticket_id that will be passed to the backend
});

// Define the bookTicket function to send a POST request when booking a ticket
const bookTicket = (ticketId) => {
    // Update the ticket_id in the form before sending the POST request
    form.ticket_id = ticketId;

    // Submit the form to the backend (make sure 'bookings.store' route is defined in your Laravel routes)
    form.post(route('bookings.store'));
};
</script>

<template>
    <AppLayout title="Buses">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Buses
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div>
                    <h1 class="text-2xl font-bold">Available Buses</h1>
                    <div v-for="bus in buses" :key="bus.id" class="p-4 border-b">
                        <h2 class="text-xl">{{ bus.bus_name }} ({{ bus.bus_number }})</h2>
                        <div v-for="ticket in bus.tickets" :key="ticket.id">
                            <button
                                v-if="!ticket.is_booked"
                                @click="bookTicket(ticket.id)"
                                class="bg-blue-500 text-white px-4 py-2 rounded mt-2"
                            >
                                Book Seat #{{ ticket.seat_number }} - ${{ ticket.price }}
                            </button>
                            <span v-else class="text-red-500">Seat #{{ ticket.seat_number }} - Booked</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

