<x-app-layout>
    <x-slot name="header">
        <h2 class="dashboard_header-title">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="dashboard_container">
        <!-- Main Content -->
        <main class="dashboard_main-content">
            <!-- Top Stats -->
            <div class="dashboard_stats-grid">
                <div class="dashboard_card">
                    <div class="dashboard_label">Total Products</div>
                    <div class="dashboard_value">{{ $totalProducts }}</div>
                </div>
                <div class="dashboard_card">
                    <div class="dashboard_label">Products Sold</div>
                    <div class="dashboard_value"></div>
                </div>
                <div class="dashboard_card">
                    <div class="dashboard_label">Low Stock Alerts</div>
                    <div class="dashboard_value"></div>
                </div>
            </div>

             <div class="dashboard_chart-card">
                 <h3>Monthly Product Sales</h3>
                 <div class="dashboard_chart-bars">
                     <div class="dashboard_bar" style="height: 40px;"><span>Mar</span></div>
                     <div class="dashboard_bar" style="height: 60px;"><span>Apr</span></div>
                     <div class="dashboard_bar" style="height: 80px;"><span>May</span></div>
                     <div class="dashboard_bar dashboard_active" style="height: 130px;"><span>Jun</span></div>
                     <div class="dashboard_bar" style="height: 60px;"><span>Jul</span></div>
                     <div class="dashboard_bar" style="height: 50px;"><span>Aug</span></div>
                     <div class="dashboard_bar" style="height: 60px;"><span>Sep</span></div>
                     <div class="dashboard_bar" style="height: 50px;"><span>Oct</span></div>
                     <div class="dashboard_bar" style="height: 50px;"><span>Nov</span></div>
                 </div>
                 <div class="dashboard_chart-value">$15,000</div>
             </div>
            
            <!-- Activities & Recent Invoices -->
            <div class="dashboard_bottom-grid">
                <div class="dashboard_recent-invoices-card">
                    <h3>Recent Invoices</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date Created</th>
                                <th>Client</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PQ-4491C</td>
                                <td>3 Jul, 2020</td>
                                <td>Daniel Padilla</td>
                                <td>$2,450</td>
                                <td><span class="dashboard_status dashboard_paid">PAID</span></td>
                            </tr>
                            <tr>
                                <td>PN-9911J</td>
                                <td>21 May, 2021</td>
                                <td>Christina Jacobs</td>
                                <td>$14,810</td>
                                <td><span class="dashboard_status dashboard_overdue">OVERDUE</span></td>
                            </tr>
                            <tr>
                                <td>UV-2319A</td>
                                <td>14 Apr, 2020</td>
                                <td>Elizabeth Bailey</td>
                                <td>$450</td>
                                <td><span class="dashboard_status dashboard_paid">PAID</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="dashboard_recent-invoices-card">
                    <h3>Recent Orders</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Client</th>
                                <th>Products</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
