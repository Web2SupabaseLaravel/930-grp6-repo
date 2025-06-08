import React from 'react';
import { Card, Text, Metric, AreaChart, DonutChart, BarChart } from '@tremor/react';
import { ArrowUpRight, ArrowDownRight } from 'lucide-react';

const statsCards = [
  { title: 'Total Revenue', value: '50.8K', change: '+12.3%', isPositive: true },
  { title: 'Monthly Users', value: '23.6K', change: '-2.3%', isPositive: false },
  { title: 'Active Events', value: '756', change: '+5.3%', isPositive: true },
  { title: 'Subscriptions', value: '2.3K', change: '+12.5%', isPositive: true },
];

const websiteVisitors = [
  { name: 'Organic', value: 30 },
  { name: 'Social', value: 50 },
  { name: 'Direct', value: 20 },
];

const Dashboard = () => {
  return (
    <div className="space-y-6">
      {/* Stats Grid */}
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        {statsCards.map((stat) => (
          <Card key={stat.title} className="bg-card-bg border-none">
            <Text className="text-gray-400">{stat.title}</Text>
            <div className="flex items-center justify-between mt-2">
              <Metric className="text-white">{stat.value}</Metric>
              <div className={`flex items-center ${stat.isPositive ? 'text-green-500' : 'text-red-500'}`}>
                {stat.isPositive ? <ArrowUpRight size={20} /> : <ArrowDownRight size={20} />}
                <span className="ml-1">{stat.change}</span>
              </div>
            </div>
          </Card>
        ))}
      </div>

      {/* Charts Grid */}
      <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <Card className="bg-card-bg border-none">
          <Text className="text-gray-400 mb-4">Website Visitors</Text>
          <DonutChart
            data={websiteVisitors}
            category="value"
            index="name"
            valueFormatter={(value) => `${value}%`}
            colors={['purple', 'cyan', 'indigo']}
            className="h-60"
          />
        </Card>

        <Card className="bg-card-bg border-none">
          <Text className="text-gray-400 mb-4">Revenue by Customer Type</Text>
          <BarChart
            data={[
              { month: 'Jan', Regular: 2000, Premium: 3000, Enterprise: 4000 },
              { month: 'Feb', Regular: 1500, Premium: 2500, Enterprise: 3500 },
              { month: 'Mar', Regular: 3000, Premium: 4000, Enterprise: 5000 },
            ]}
            index="month"
            categories={['Regular', 'Premium', 'Enterprise']}
            colors={['purple', 'cyan', 'indigo']}
            valueFormatter={(value) => `$${value}`}
            className="h-60"
          />
        </Card>
      </div>

      {/* Orders Table */}
      <Card className="bg-card-bg border-none">
        <div className="flex justify-between items-center mb-4">
          <Text className="text-gray-400">Orders Status</Text>
          <button className="px-4 py-2 bg-accent-purple rounded-lg text-white text-sm">
            Download
          </button>
        </div>
        <div className="overflow-x-auto">
          <table className="w-full">
            <thead>
              <tr className="text-gray-400 text-left">
                <th className="pb-4">Order ID</th>
                <th className="pb-4">Customer</th>
                <th className="pb-4">Date</th>
                <th className="pb-4">Status</th>
                <th className="pb-4 text-right">Amount</th>
              </tr>
            </thead>
            <tbody className="text-gray-300">
              {[1, 2, 3].map((i) => (
                <tr key={i} className="border-t border-gray-700">
                  <td className="py-4">#1234{i}</td>
                  <td className="py-4">John Doe</td>
                  <td className="py-4">2024-01-{i}</td>
                  <td className="py-4">
                    <span className="px-3 py-1 rounded-full text-xs bg-green-500/20 text-green-500">
                      Completed
                    </span>
                  </td>
                  <td className="py-4 text-right">$299.00</td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </Card>
    </div>
  );
};

export default Dashboard; 