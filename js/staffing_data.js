
const staffingData = {
  divisions: [
    {
      name: "Cascade Division",
      dutyOfficer: "Jane Smith",
      agencyAdmins: ["Jane Smith (541-555-1234 / 541-555-5678, jane.smith@example.com)"],
      lastModified: "8/3/2025, 6:00:17 PM",
      resources: [
        {
          type: "Duty Officer",
          name: "OR-DEF-BC41",
          leader: "Jane Smith",
          assigned: 1,
          status: "In Service",
          location: "Cascade Division",
          remarks: "Covering east side"
        }
      ]
    }
  ],
  aviation: [
    {
      type: "Rotor Wing",
      resource: "N1234H",
      status: "Available",
      location: "Redmond",
      onoff: "0800-2000"
    },
    {
      type: "Fixed Wing",
      resource: "N5678F",
      status: "Unavailable",
      location: "Prineville",
      onoff: "0800-2000"
    }
  ]
};
