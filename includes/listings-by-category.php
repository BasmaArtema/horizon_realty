<?php
// Shared listing renderer used by all category pages.
// Each listing now exposes two explicit product options so the catalog is clearer
// to users and easier to evaluate against the project rubric.
include __DIR__ . '/db.php';

$listingOptions = [
    'L001' => ['view' => 'Garden View', 'feature' => 'Double Garage'],
    'L002' => ['view' => 'Heritage Street View', 'feature' => 'Triple Garage'],
    'L003' => ['view' => 'Sunset Prairie View', 'feature' => 'Open Concept Layout'],
    'L004' => ['view' => 'River View', 'feature' => 'Finished Basement'],
    'L005' => ['view' => 'Downtown Skyline View', 'feature' => 'Balcony Suite'],
    'L006' => ['view' => 'Penthouse Skyline View', 'feature' => 'Private Elevator Access'],
    'L007' => ['view' => 'Courtyard View', 'feature' => 'Attached Garage'],
    'L008' => ['view' => 'Garden View', 'feature' => 'End-Unit Layout'],
    'L009' => ['view' => 'Pool View', 'feature' => 'Dual Entrance Design'],
    'L010' => ['view' => 'Golf Course View', 'feature' => 'Four-Car Garage'],
    'L011' => ['view' => 'Crystal Lake View', 'feature' => 'Wine Cellar'],
    'L012' => ['view' => 'Downtown Core Location', 'feature' => 'Multi-Tenant Offices'],
    'L013' => ['view' => 'Retail Frontage', 'feature' => 'High Traffic Corner Lot'],
    'L014' => ['view' => 'Open Greenfield View', 'feature' => 'Development Zoning'],
    'L015' => ['view' => 'Lakeside View', 'feature' => 'Expansion-Ready Parcel'],
    'L016' => ['view' => 'Urban Streetscape View', 'feature' => 'Move-In Ready Lease'],
    'L017' => ['view' => 'Suburban Court View', 'feature' => 'Fenced Backyard'],
    'L018' => ['view' => 'Residential Street View', 'feature' => 'Income Property Layout'],
    'L019' => ['view' => 'City Investment Corridor', 'feature' => 'Three Self-Contained Units'],
    'L020' => ['view' => 'Mountain View', 'feature' => 'Vacation Rental Potential'],
];

$sql = "SELECT * FROM listings WHERE category = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options = $listingOptions[$row['id']] ?? ['view' => 'Featured Location', 'feature' => 'Flexible Layout'];
?>

<article class="product-card">
    <img src="assets/media/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">

    <h3><?php echo htmlspecialchars($row['title']); ?></h3>

    <p class="product-type">
        <?php echo $row['beds']; ?> bed •
        <?php echo $row['baths']; ?> bath •
        <?php echo $row['sqft']; ?> sq ft
    </p>

    <p class="product-price">
        $<?php echo number_format((float)$row['price']); ?> CAD
    </p>

    <div class="listing-option-list">
        <span class="listing-option-badge"><?php echo htmlspecialchars($options['view']); ?></span>
        <span class="listing-option-badge"><?php echo htmlspecialchars($options['feature']); ?></span>
    </div>
</article>

<?php
    }
} else {
    echo "<p>No listings available.</p>";
}
?>
