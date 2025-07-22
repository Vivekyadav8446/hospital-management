<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Invoice</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #invoice-print, #invoice-print * {
                visibility: visible;
            }
            #invoice-print {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            .no-print {
                display: none;
            }
        }
        .prescription-card {
            border-left: 4px solid #0d6efd;
        }
    </style>
</head>
<body class="bg-light">
<?php 
include("../include/header.php");
include("../include/connection.php"); 
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" style="margin-left: -30px;">
            <?php include("sidenav.php"); ?>
        </div>
        <div class="col-md-10 py-3">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">View Invoice & Prescription</h4>
                <div class="no-print">
                    <button onclick="window.print()" class="btn btn-outline-primary me-2">
                        <i class="bi bi-printer"></i> Print
                    </button>
                    <button onclick="generatePDF()" class="btn btn-primary">
                        <i class="bi bi-download"></i> Download PDF
                    </button>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div id="invoice-print" class="bg-white p-4 rounded shadow-sm">
                        <?php
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = "SELECT * FROM income WHERE id = '$id'";
                            $res = mysqli_query($connect,$query);
                            $row = mysqli_fetch_array($res);
                            
                            // Get doctor's details
                            $doctor_query = "SELECT * FROM doctors WHERE username='".$row['doctor']."'";
                            $doctor_res = mysqli_query($connect, $doctor_query);
                            $doctor_row = mysqli_fetch_array($doctor_res);
                            $doctor_name = isset($doctor_row['firstname']) ? 
                                $doctor_row['firstname'].' '.$doctor_row['surname'] : $row['doctor'];
                        ?>
                        
                        <div class="text-center mb-4">
                            <h3 class="text-primary">Medical Invoice</h3>
                            <p class="text-muted">Invoice Date: <?php echo date('d/m/Y', strtotime($row['date_discharge'])); ?></p>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        Invoice Details
                                    </div>
                                    <div class="card-body">
                                        <dl class="row mb-0">
                                            <dt class="col-sm-4">Doctor</dt>
                                            <dd class="col-sm-8"><?php echo $doctor_name; ?></dd>
                                            
                                            <dt class="col-sm-4">Patient</dt>
                                            <dd class="col-sm-8"><?php echo $row['patient']; ?></dd>
                                            
                                            <dt class="col-sm-4">Date</dt>
                                            <dd class="col-sm-8"><?php echo date('d/m/Y', strtotime($row['date_discharge'])); ?></dd>
                                            
                                            <dt class="col-sm-4">Amount Paid</dt>
                                            <dd class="col-sm-8"><?php echo '₹' . number_format($row['amount_paid'], 2); ?></dd>
                                            
                                            <dt class="col-sm-4">Description</dt>
                                            <dd class="col-sm-8"><?php echo $row['description']; ?></dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            
                            <?php if(!empty($row['med_name'])): ?>
                            <div class="col-md-6">
                                <div class="card prescription-card">
                                    <div class="card-header bg-info text-white">
                                        Prescription Details
                                    </div>
                                    <div class="card-body">
                                        <dl class="row mb-0">
                                            <dt class="col-sm-4">Medicine</dt>
                                            <dd class="col-sm-8"><?php echo $row['med_name']; ?></dd>
                                            
                                            <dt class="col-sm-4">Dosage</dt>
                                            <dd class="col-sm-8"><?php echo $row['dosage']; ?></dd>
                                            
                                            <dt class="col-sm-4">Frequency</dt>
                                            <dd class="col-sm-8"><?php echo $row['frequency']; ?></dd>
                                            
                                            <dt class="col-sm-4">Duration</dt>
                                            <dd class="col-sm-8"><?php echo $row['duration']; ?></dd>
                                            
                                            <dt class="col-sm-4">Instructions</dt>
                                            <dd class="col-sm-8"><?php echo nl2br($row['instructions']); ?></dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mt-4 text-end">
                            <div class="d-inline-block text-center">
                                <div class="border-top pt-2" style="width: 200px;">
                                    <p class="mb-1">_________________________</p>
                                    <p class="text-muted">Authorized Signature</p>
                                </div>
                            </div>
                        </div>
                        
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // PDF Generation with error handling
    function generatePDF() {
        try {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            
            // Add title
            doc.setFontSize(18);
            doc.setTextColor(13, 110, 253);
            doc.text('MEDICAL INVOICE & PRESCRIPTION', 105, 20, { align: 'center' });
            
            // Invoice date
            doc.setFontSize(12);
            doc.setTextColor(100, 100, 100);
            doc.text('Invoice Date: <?php echo date('d/m/Y', strtotime($row['date_discharge'])); ?>', 105, 30, { align: 'center' });
            
            // Invoice data
            const invoiceData = [
                ["Doctor", "<?php echo $doctor_name; ?>"],
                ["Patient", "<?php echo $row['patient']; ?>"],
                ["Date", "<?php echo date('d/m/Y', strtotime($row['date_discharge'])); ?>"],
                ["Amount Paid", "<?php echo '₹' . number_format($row['amount_paid'], 2); ?>"],
                ["Description", "<?php echo $row['description']; ?>"]
            ];
            
            // Add invoice table
            doc.autoTable({
                startY: 40,
                head: [['Invoice Details', '']],
                body: invoiceData,
                theme: 'grid',
                headStyles: {
                    fillColor: [13, 110, 253],
                    textColor: 255,
                    fontStyle: 'bold'
                },
                styles: {
                    cellPadding: 5,
                    fontSize: 12,
                    valign: 'middle'
                },
                columnStyles: {
                    0: { cellWidth: 50, fontStyle: 'bold' },
                    1: { cellWidth: 'auto' }
                }
            });
            
            // Prescription data if exists
            <?php if(!empty($row['med_name'])): ?>
            const prescriptionData = [
                ["Medicine Name", "<?php echo $row['med_name']; ?>"],
                ["Dosage", "<?php echo $row['dosage']; ?>"],
                ["Frequency", "<?php echo $row['frequency']; ?>"],
                ["Duration", "<?php echo $row['duration']; ?>"],
                ["Instructions", "<?php echo $row['instructions']; ?>"]
            ];
            
            doc.autoTable({
                startY: doc.lastAutoTable.finalY + 20,
                head: [['Prescription Details', '']],
                body: prescriptionData,
                theme: 'grid',
                headStyles: {
                    fillColor: [23, 162, 184],
                    textColor: 255,
                    fontStyle: 'bold'
                },
                styles: {
                    cellPadding: 5,
                    fontSize: 12,
                    valign: 'middle'
                },
                columnStyles: {
                    0: { cellWidth: 50, fontStyle: 'bold' },
                    1: { cellWidth: 'auto' }
                }
            });
            <?php endif; ?>
            
            // Add signature
            doc.text(150, doc.lastAutoTable.finalY + 20, '_________________________');
            doc.text(150, doc.lastAutoTable.finalY + 30, 'Authorized Signature');
            
            // Save PDF
            doc.save('Medical_Record_<?php echo $row['patient'] . '_' . date('Ymd'); ?>.pdf');
            
        } catch (error) {
            alert('Error generating PDF: ' + error.message);
            console.error(error);
        }
    }
</script>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>